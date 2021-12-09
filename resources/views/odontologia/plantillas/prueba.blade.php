<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('scss/odontologia/estilos.css') }}">

</head>

<body>
    <table id="tb-odontograma">
        <tr>
            <td><input type="text" name="" id=""></td>
            <td><input type="text" name="" id=""></td>
            <td><input type="text" name="" id=""></td>
            <td><input type="text" name="" id=""></td>
            <td><input type="text" name="" id=""></td>
            <td><input type="text" name="" id=""></td>
            <td><input type="text" name="" id=""></td>
            <td><input type="text" name="" id=""></td>
            <td><input type="text" name="" id=""></td>
            <td><input type="text" name="" id=""></td>
            <td><input type="text" name="" id=""></td>
            <td><input type="text" name="" id=""></td>
            <td><input type="text" name="" id=""></td>
            <td><input type="text" name="" id=""></td>
            <td><input type="text" name="" id=""></td>
            <td><input type="text" name="" id=""></td>
        </tr>
        <tr>
            <td><input type="text" name="" id=""></td>
            <td><input type="text" name="" id=""></td>
            <td><input type="text" name="" id=""></td>
            <td><input type="text" name="" id=""></td>
            <td><input type="text" name="" id=""></td>
            <td><input type="text" name="" id=""></td>
            <td><input type="text" name="" id=""></td>
            <td><input type="text" name="" id=""></td>
            <td><input type="text" name="" id=""></td>
            <td><input type="text" name="" id=""></td>
            <td><input type="text" name="" id=""></td>
            <td><input type="text" name="" id=""></td>
            <td><input type="text" name="" id=""></td>
            <td><input type="text" name="" id=""></td>
            <td><input type="text" name="" id=""></td>
            <td><input type="text" name="" id=""></td>
        </tr>
        <tr>
            <td>
                <?php
                    $diente =
                        "<div class='diente' tipo='vestibular' num='15'>" .
                        getDienteImgBase64('vestibular') .
                        "</div>";
                    echo $diente;
                    
                    function getDienteImgBase64($tipo)
                    {
                        $svgVestibular='<svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 102.41 102.41">
        <polygon side="top" class="btn-diente btn-diente-hover" points="1.21 1.21 26.21 26.21 76.21 26.21 101.21 1.21 1.21 1.21">
        </polygon>
        <polygon side="right" class="btn-diente btn-diente-hover" points="101.21 1.21 76.21 26.21 76.21 76.21 101.21 101.21 101.21 1.21">
        </polygon>
        <polygon side="left" class="btn-diente btn-diente-hover" points="1.21 1.21 26.21 26.21 26.21 76.21 1.21 101.21 1.21 1.21">
        </polygon>
        <polygon side="bottom" class="btn-diente btn-diente-hover" points="1.21 101.21 26.21 76.21 76.21 76.21 101.21 101.21 1.21 101.21">
        </polygon>
        <rect side="center" class="btn-diente btn-diente-hover" x="26.21" y="26.21" width="50" height="50">
        </rect>
    </svg>';
                        
                        $svgLingual='
                                        <svg width="100%" height="100%" viewBox="-0.5 -0.5 105 105">
                                            <line x1="68.18" y1="32.82" x2="85.86" y2="15.14"></line>
                                            <line x1="32.82" y1="32.82" x2="15.14" y2="15.14"></line>
                                            <path side="top" class="btn-diente btn-diente-hover" d="M32.82,32.82,15.14,15.14A49.21,49.21,0,0,1,50.5.5,49.21,49.21,0,0,1,85.86,15.14L68.18,32.82A23.85,23.85,0,0,0,50.5,25.5,23.85,23.85,0,0,0,32.82,32.82Z"></path>
                                            <path side="right" class="btn-diente btn-diente-hover" d="M68.18,32.82,85.86,15.14A49.21,49.21,0,0,1,100.5,50.5,49.21,49.21,0,0,1,85.86,85.86L68.18,68.18A23.85,23.85,0,0,0,75.5,50.5,23.85,23.85,0,0,0,68.18,32.82Z"></path>
                                            <path side="left" class="btn-diente btn-diente-hover" d="M32.82,68.18,15.14,85.86A49.21,49.21,0,0,1,.5,50.5,49.21,49.21,0,0,1,15.14,15.14L32.82,32.82A23.85,23.85,0,0,0,25.5,50.5,23.85,23.85,0,0,0,32.82,68.18Z"></path>
                                            <path side="bottom" class="btn-diente btn-diente-hover" d="M68.18,68.18,85.86,85.86A49.21,49.21,0,0,1,50.5,100.5,49.21,49.21,0,0,1,15.14,85.86L32.82,68.18A23.85,23.85,0,0,0,50.5,75.5,23.85,23.85,0,0,0,68.18,68.18Z"></path>
                                            <circle side="center" class="btn-diente btn-diente-hover" cx="50.5" cy="50.5" r="25"></circle>
                                            <line x1="68.31" y1="68.31" x2="85.98" y2="85.98"></line>
                                            <line x1="32.69" y1="68.31" x2="15.02" y2="85.98"></line>
                                        </svg>
                        ';
                        $svgVestibular=htmlEntities($svgVestibular);
                        if($tipo==='vestibular'){
                            $img='<img src="data:image/svg+xml;base64,'. base64_encode($svgVestibular).'">';
                        }else{
                            $img='<img src="data:image/svg+xml;base64,'. base64_encode($svgLingual).'">';
                        }
                        return $img;
                    }
                ?>

            </td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </table>
</body>

</html>
