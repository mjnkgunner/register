<?php
$sanpham = [
    'name' => 'bimbim',
    'gia' => '200',
    'ma' => '001'
];

$sanpham['nsx'] = '1/1/1111';

unset($sanpham['gia']);
if(in_array('bimbim',$sanpham)){
    echo"co";
}else{
    echo"k";
}
// hoanghiep
foreach ($sanpham as $key => $value) {
    echo "$key: $value <br>";
}
?>



