	<?php
  if($pdfFile){

    $path = str_replace( site_url('/'), ABSPATH, esc_url( $pdfFile) );
    if ( is_file( $path ) ){
      $filesize = size_format( filesize( $path ) );
      $filename = basename($path);
    }
    $imagick = new Imagick();
    $imagick->readImage($pdfFile);
    $imagick->setResolution(150, 150);
    $imagick->setImageFormat( "jpg" );

    echo "<figure class='pdf_image'>";
    echo '<img src="data:image/png;base64,'.base64_encode($imagick->getImageBlob()).'"/>';
    echo "</figure>";
  }
