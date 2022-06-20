<?php

include("../functions.php");
$ch = new Business();

  // if (isset($_POST['item_selection'])) {

                      // if (!empty($_POST['selectedValue'])) {
                      //   $selectedValue = $_POST['selectedValue'];
                        // echo $selectedValue;

                         $sortedItems = $ch->getSortedItem();
                          foreach ($sortedItems as $row) {
                            echo '

                          <tr>
                            <td>'.$row['itemID'].'</td>
                            <td>'.$row['itemName'].'</td>
                            <td>'.$row['quantity'].'</td>
                            <td>'.$row['price'].'</td>
                            <td>'.$row['description'].'</td>
                          </tr>


                            ';
                          }



                      // }else {
                      //   echo "<script>alert('select field')</script>";
                      // }
                      
                    // }




  ?>