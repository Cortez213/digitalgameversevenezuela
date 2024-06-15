<tr>
            <td>1</td>
            <td>Usuario Administrador</td>
            <td>admin</td>
            <td><img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail" width="40px"></td>
            <td>Administrador</td>
            <td><button class="btn btn-success btn-xs">Activado</button></td>
            <td>2017-12-11 12:05:32</td>
            <td>

              <div class="btn-group">
                  
                <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>

                <button class="btn btn-danger"><i class="fa fa-times"></i></button>

              </div>  

            </td>

          </tr>

           <tr>
            <td>1</td>
            <td>Usuario Administrador</td>
            <td>admin</td>
            <td><img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail" width="40px"></td>
            <td>Administrador</td>
            <td><button class="btn btn-danger btn-xs">Desactivado</button></td>
            <td>2017-12-11 12:05:32</td>
            <td>


            
            <span style: "color: black;">Inicio</span>






            case 'c': {
											// get current X position
											preg_match('/([0-9\.\+\-]*)[\s]([0-9\.\+\-]*)[\s]([0-9\.\+\-]*)[\s]([0-9\.\+\-]*)[\s]([0-9\.\+\-]*)[\s]('.$strpiece[1][0].')[\s](c)([\s]*)/x', $pmid, $xmatches);
											if (!isset($xmatches[1])) {
												break;
											}
											$currentxpos = $xmatches[1];
											// justify block
											if (preg_match('/('.$xmatches[1].')[\s]('.$xmatches[2].')[\s]('.$xmatches[3].')[\s]('.$xmatches[4].')[\s]('.$xmatches[5].')[\s]('.$strpiece[1][0].')[\s](c)([\s]*)/x', $pmid, $pmatch) == 1) {
												$newx1 = sprintf('%F',(floatval($pmatch[1]) + $spacew));
												$newx2 = sprintf('%F',(floatval($pmatch[3]) + $spacew));
												$newx3 = sprintf('%F',(floatval($pmatch[5]) + $spacew));
												$newpmid = $newx1.' '.$pmatch[2].' '.$newx2.' '.$pmatch[4].' '.$newx3.' '.$pmatch[6].' x*#!#*x'.$pmatch[7].$pmatch[8];
												$pmid = str_replace($pmatch[0], $newpmid, $pmid);
												unset($pmatch, $newpmid, $newx1, $newx2, $newx3);
											}
											break;
										}
									}