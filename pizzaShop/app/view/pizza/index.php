<?php
include VIEW . 'header.phtml';
?>
    <a href="/pizza/$item['id']"></a>
<h1>pizza list</h1>

    <form action="/user/test" method="post">

<?php
if(array_key_exists('pizza',$this->view_data)){

    $table='<table border=1>';
    $i=0;
        $table.='<tr>';
        $table.= '<td>'.'id'. '</td>'.'<td>'.'name'. '</td>'.'<td>'.'cena'. '</td>'.'<td>'.'sustavki'. '</td>'.'<td>'.'categoria'. '</td>'.'<td>'.'check'. '</td>';
        $table.='</tr>';
        $pizza=$this->view_data['pizza'];
            foreach ($pizza as $item){
                $id=$item['id'];
                $table.='<tr>';
                $table.='<td>'.$item['id']. '</td>'.'<td>'.
                    "<a href='/pizza/$id'>"
                .$item['name']. '</a>'.'</td>'.'<td>'.$item['cena']. '</td>'.'<td>'.$item['sustavki']. '</td>'.'<td>'.$item['categoria']. '</td>'.'<td>'.
                    /**
                     * бутона за добавяне да продукти в сесията
                     */
                    '<button type="submit" name='.$i++.' value='.$item['id'].'>'.'dobavi'.'</button>'. '</td>';
                $table.='</tr>';
            }

        $table.='</table>';
    echo $table;
}

?>
    <br><br>
<!--    <input type="submit" value="dobavi" name="testttt">-->
    </form>
<br>
    <a href="/user/null"><button>zanuli</button></a>
<?php
echo "<pre>";
print_r($_SESSION['test']);
echo"</pre>";
include VIEW . 'footer.phtml';
?>