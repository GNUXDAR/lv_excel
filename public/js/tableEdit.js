function getColumnCount()
{
return document.getElementById('myTable').getElementsByTa gName('tr')[0].getElementsByTagName('td').length; 
}

function getRowCount()
{
return document.getElementById('myTable').rows.length;
}

function doAdd(ths)
{
//alert(ths.parentNode.cellIndex);
//alert(getColumnCount());
var lastCol = getColumnCount()-1;
var lastRow = getRowCount()-1;
//for Column Sum
var table = document.getElementById("myTable");
var row = table.rows[ths.parentNode.parentNode.rowIndex];
var colSum=0;
for(var i=0;i<lastCol;i++)
colSum=eval(colSum) + eval(row.cells[i].childNodes[0].value);
row.cells[lastCol].innerHTML = colSum;

//for Row Sum
var cIndex = ths.parentNode.cellIndex;
//alert(cIndex);
var rowSum = 0;
for(var i=0;i<lastRow;i++)
rowSum = eval(rowSum) + parseInt(table.rows[i].cells[cIndex].childNodes[0].value);
table.rows[lastRow].cells[cIndex].innerHTML = rowSum;


//for the final Value in the last row last column 
var finSum = 0;
for(var i=0;i<lastRow;i++)
finSum = eval(finSum) + parseInt(table.rows[i].cells[lastCol].innerHTML);
for(var i=0;i<lastCol;i++)
finSum=eval(finSum)/*+ eval(table.rows[lastRow].cells[i].innerHTML)*/;
table.rows[lastRow].cells[lastCol].innerHTML = finSum;
}
