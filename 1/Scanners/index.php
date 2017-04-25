<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
function SelectAll(obj) {

	  // find the index of column
	  var table = $(obj).closest('table'); // find the current table
	  var th_s = table.find('th'); // find/get all the <th> of current table
	  var current_th = $(obj).closest('th'); // get current <th>

	  // the value of n is "1-indexed", meaning that the counting starts at 1
	  var columnIndex = th_s.index(current_th) + 1; // find index of current <th> within list of <th>'s

	  console.log('The Column is = ' + columnIndex); // print the index for testing

	  // select all checkboxes from the same column index of the same table
	  table.find('td:nth-child(' + (columnIndex) + ') input').prop("checked", obj.checked);
	}


</script>


<table>
  <tr>
    <th>
      <input type="checkbox" onclick="SelectAll(this)" />
    </th>
    <th>Name</th>
    <th>
      <input type="checkbox" onclick="SelectAll(this)" />Is Active</th>
  </tr>
  <tr>
    <td>
      <input type="checkbox" />
    </td>
    <td>John</td>
    <td>
      <input type="checkbox" name="isActive" />
    </td>
  </tr>
  <tr>
    <td>
      <input type="checkbox" />
    </td>
    <td>Tim</td>
    <td>
      <input type="checkbox" name="isActive" />
    </td>
  </tr>
</table>
<br/>
<h2>
Another Table<hr/>
</h2>
<table>
  <tr>
    <th>
      <input type="checkbox" onclick="SelectAll(this)" />
    </th>
    <th>Name</th>
    <th>
      <input type="checkbox" onclick="SelectAll(this)" />Is Active</th>
  </tr>
  <tr>
    <td>
      <input type="checkbox" />
    </td>
    <td>John</td>
    <td>
      <input type="checkbox" name="isActive" />
    </td>
  </tr>
  <tr>
    <td>
      <input type="checkbox" />
    </td>
    <td>Tim</td>
    <td>
      <input type="checkbox" name="isActive" />
    </td>
  </tr>
</table>