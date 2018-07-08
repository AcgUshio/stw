<?php

// 应用公共文件
define('EXCEL_EXTENSION_2003', "xls");
define('EXCEL_EXTENSION_2007', "xlsx");
 
 
/**
 * 处理Excel中图片
 *
 * @param string $file_name 文件名
 * @param string $full_path 文件完整路径
 */
function process_excel_image($file_name, $full_path)
{
    // 引入PHPEXCEL类
    import('PHPExcel_IOFactory',   "/vendor/phpoffice/PhpExcel/PHPExcel/");
    import('PHPExcel',  "/vendor/phpoffice/PhpExcel/");
    // 判断文件版本，选择对应的解析文件
    if(getExtendFileName($file_name) == EXCEL_EXTENSION_2003)
    {
        $reader = \PHPExcel_IOFactory::createReader('Excel5');
    }
    else if(getExtendFileName($file_name) == EXCEL_EXTENSION_2007)
    {
        $reader = new \PHPExcel_Reader_Excel2007();
    }
 
    // 解析Excel文件
    // $objPHPExcel = $objReader->load(ROOT_PATH . "public/uploads/" . $file_path);
    $PHPExcel = $reader->load($full_path);
    $worksheet = $PHPExcel->getActiveSheet();
    $imageInfo = extractImageFromWorksheet($worksheet, ROOT_PATH . "public/uploads/school/");
 
    return $imageInfo;
}
 
/**
 * 返回文件路径的信息
 *
 * @param string $file_name
 * @return string
 */
function getExtendFileName($file_name) {
      
    $extend = pathinfo($file_name);
    $extend = strtolower($extend["extension"]);
    return $extend;
}
 
/**
 * worksheet中提取image
 *
 * @param object $worksheet
 * @param string $basePath
 */
function extractImageFromWorksheet($worksheet,$basePath){
      
    $result = array();
      
    $imageFileName = "";
      
    foreach ($worksheet->getDrawingCollection() as $drawing) {
        $xy=$drawing->getCoordinates();
        $path = $basePath;
        // for xlsx
        if ($drawing instanceof \PHPExcel_Worksheet_Drawing) {
              
            $filename = $drawing->getPath();
              
            $imageFileName = $drawing->getIndexedFilename();
              
            // 可能是office版本的缘故，获取出来的图片文件名字
            // 很容易造成文件名重复导致图片被覆盖，这里做了一下
            // 处理对图片名字进行微秒的md5处理。
            // process imageFileName
            $tmp = explode(".", $imageFileName);
            $tmp[0] = md5(microtime(true));
            $tmp_fileName = implode(".", $tmp);
            // process imageFileName
                 
            // $path = $path . $drawing->getIndexedFilename();
            $path = $path . $tmp_fileName;
              
            $boo = copy($filename, $path);
              
            $result[$xy] = $path;
              
            // for xls
        } else if ($drawing instanceof \PHPExcel_Worksheet_MemoryDrawing) {
              
            $image = $drawing->getImageResource();
              
            $renderingFunction = $drawing->getRenderingFunction();
              
            switch ($renderingFunction) {
                  
                case \PHPExcel_Worksheet_MemoryDrawing::RENDERING_JPEG:
                      
                    $imageFileName = $drawing->getIndexedFilename();
                    $path = $path . $drawing->getIndexedFilename();
                    imagejpeg($image, $path);
                    break;
                      
                case \PHPExcel_Worksheet_MemoryDrawing::RENDERING_GIF:
                    $imageFileName = $drawing->getIndexedFilename();
                    $path = $path . $drawing->getIndexedFilename();
                    imagegif($image, $path);
                    break;
                      
                case \PHPExcel_Worksheet_MemoryDrawing::RENDERING_PNG:
                    $imageFileName = $drawing->getIndexedFilename();
                    $path = $path . $drawing->getIndexedFilename();
                    imagegif($image, $path);
                    break;
                      
                case \PHPExcel_Worksheet_MemoryDrawing::RENDERING_DEFAULT:
                    $imageFileName = $drawing->getIndexedFilename();
                    $path = $path . $drawing->getIndexedFilename();
                    imagegif($image, $path);
                    break;
            }
            $result[$xy] = $imageFileName;
        }
    }
    return $result;
}