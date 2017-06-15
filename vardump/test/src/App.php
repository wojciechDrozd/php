<?php

/**
 * Main.php
 * @author: Kamil Madejski <kamil.madejski@yahoo.com>
 */

class App
{
    private $_fileNameToSave;

    /**
     * Contains gathered categories.
     * @var CategoriesList
     */
    private $_productCategories;

    /**
     * Contains gathered products.
     * @var array
     */
    private $_products;
    private $_domDocument;

    /**
     * Main constructor.
     */
    public function __construct(string $extension, int $printResults)
    {
        if (php_sapi_name() !== 'cli') {
            die('This script needs to be used only via CLI!');
        }
        $this->_productCategories   = new CategoriesList();
        $this->_fileExtension       = $extension;
        $this->_fileNameToSave      = 'products_'.date('Ymd_His').'.'.$this->_fileExtension;
        $this->_printResults        = $printResults;

        $this->_products = array();
    }

    /**
     * Starts gathering.
     */
    public function up()
    {
        try {
            $writer = new FileWriter($this->_fileNameToSave, $this->_fileExtension);

            $this->gatherCategories();
            $this->gatherProducts(2);
            $this->removeDuplicatedProducts();
            $this->gatherProducts(1);
            $this->removeDuplicatedProducts();
            if($this->_printResults == 1) {
                $this->showProducts();
            }
            $writer->writeProducts($this->_products);
        }
        catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Gets and saves categories.
     */
    public function gatherCategories()
    {
        echo "\n### Downloading HTML...";
        $grabber = new SitemapCollector();
        $grabber->run();

        $this->_domDocument = new DOMDocument();
        $this->_domDocument->loadHTML($grabber->getHTML());
        echo " Done!\n### Preparing categories...";

        $searcher = new DOMXPath($this->_domDocument);
        $className = "sitemap";
        $nodes = $searcher->query("//ul[contains(@class, '$className')]");

        foreach ($nodes as $ul) {
            if ($ul instanceof DOMElement) {
                $ulElements = $ul->childNodes;
                foreach ($ulElements as $li) {
                    if ($li instanceof DOMElement) {
                        if ($li->getAttribute('class') == 'level-0') {
                            $this->_productCategories->add(
                                new Category(
                                    $li->nodeValue,
                                    0,
                                    UrlHelper::removeDomain($li->firstChild->getAttribute('href')),
                                    null
                                )
                            );
                        } elseif ($li->getAttribute('class') == 'level-1') {
                            $parent = $this->_productCategories->getLastParent();
                            $parent->addChild(
                                new Category(
                                    $li->nodeValue,
                                    1,
                                    UrlHelper::removeDomain($li->firstChild->getAttribute('href')),
                                    $parent
                                )
                            );
                        } elseif ($li->getAttribute('class') == 'level-2') {
                            $parent = $this->_productCategories->getLastParent(1);
                            $parent->addChild(
                                new Category(
                                    $li->nodeValue,
                                    2,
                                    UrlHelper::removeDomain($li->firstChild->getAttribute('href')),
                                    $parent
                                )
                            );
                        }
                    }
                }
            }
        }
        echo " Done!\n";
    }

    /**
     * Gathers products.
     * @param int $depth
     */
    public function gatherProducts(int $depth)
    {
        foreach ($this->_productCategories->getCategoriesWithDepth($depth) as $firstDepthCategory) {
            echo "---> Gathering products from sub-category: ".$firstDepthCategory->getName()."... ";
            $productsGrabber = new ProductsCollector($firstDepthCategory->getUrlWithoutDomain());
            $productsGrabber->run();

            $this->_domDocument = new DOMDocument();
            $this->_domDocument->loadHTML($productsGrabber->getHTML());
            $searcher = new DOMXPath($this->_domDocument);
            $className = "item-wrapper";
            $nodes = $searcher->query("//div[contains(@class, '$className')]");

            $counter = 0;
            foreach ($nodes as $itemWrapper) {
                if ($itemWrapper instanceof DOMElement) {
                    $childNodes = $itemWrapper->childNodes;
                    $h2 = $childNodes->item(1);

                    $priceBox = $childNodes->item(9);
                    $priceBoxChild = $priceBox->childNodes->item(1);
                    $price = (float)preg_replace('/[a-zA-Z\s+:+£+]+/', '', trim($priceBoxChild->nodeValue));

                    $product = new Product(
                        $firstDepthCategory->getNameWithParentName(),
                        $h2->getAttribute('title'),
                        $h2->getAttribute('href'),
                        $price
                    );
                    $this->_products[] = $product;
                    $counter++;
                }

            }
            echo "Done! Products gathered: ".$counter."\n";
        }
    }

    /**
     * Deletes nested products.
     * @return int
     */
    public function deleteDuplicateProducts()
    {
        $this->removeDuplicatedProducts();
    }

    /**
     * Prints list of products.
     */
    public function showProducts()
    {
        print_r($this->_products);
    }

    /**
     * Removes nested products.
     */
    private function removeDuplicatedProducts()
    {
        $this->_products = array_unique($this->_products);
    }
}