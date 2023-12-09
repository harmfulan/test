<?php
                       function connect_db()
                        {
                        $conn = new mysqli("172.18.0.1", "user1", "87654321", "phpdatabase");
                        if($conn->connect_error){
                            die("Ошибка: " . $conn->connect_error);
                        }
                        #echo "Подключение успешно установлено";
                        return $conn;
                        }


                        function remove_dp($POST){
                        $conn =  connect_db();
                        $id = $POST['id'];
                        $sql = "DELETE FROM classvirus WHERE(id=$id);";
                        if($result = $conn->query($sql)){
                            if (headers_sent()) {
                                die("<head> <meta http-equiv='refresh' content='0;URL=http://127.0.0.1:8080/laba6.php'/></head>");
                            }
                            else{
                                exit(header("Location: laba6.php"));
                            }
                            }
                        }

                        function add_db($POST){
                        $id_infection = $POST['zaraj'];
                        $habitat = $POST['habitat'];
                        $algorithm = $POST['algorithm'];
                        $conn = connect_db();
                         $sql = "INSERT INTO classvirus(habitat, algorithm, date_create, publication, id_user ) VALUES ('$habitat', '$algorithm', '2023-05-05', 1, 1);";
                         $conn->query($sql);
                         $id_classvirus = $conn->insert_id;
                         $sql2 = "INSERT INTO classvirus_infection(id_infection, id_classvirus ) VALUES ($id_infection, $id_classvirus);";
                         echo $sql2;
                         if($result = $conn->query($sql2)){
                             if (headers_sent()) {
                                die("<head> <meta http-equiv='refresh' content='0;URL=http://127.0.0.1:8080/laba6.php'/></head>");
                            }
                            else{
                                exit(header("Location: laba6.php"));
                            }
                         }
                        }


                        function showForm(){
                         $conn = connect_db();
                         $sql = "SELECT id, infections FROM infection;";
                         if($result = $conn->query($sql)){
                            printf("
                            <form method='POST' action='add_db.php'>
                            <div>
                            <label for='infection'>Cпособ заражения:</label><br>");
                            echo "<select name='zaraj' required style=' width: 500px;
                                                                padding: 12px 20px;
                                                                margin: 8px 0;
                                                                box-sizing: border-box;
                                                                font-size: 18px;
                                                                border: 1px solid #555;
                                                                outline: none; background-color: lightblue;' >";
                            echo "<option value=''>-- Выберите способ заражения --</option>";
                            foreach($result as $row){
                            printf("<option value='%s'>%s</option>
                                ",$row['id'], $row['infections']);
                                }
                            echo "</select>";
                            printf("
                            </div>
                            <div>
                            <label for='habitat'>Среда обитания:</label><br>
                            <input type='text' name='habitat' id='habitat'/>
                            </div>
                            <div>
                            <label for='algorithm'>Особенность алгоритма:</label><br>
                            <input type='text' name='algorithm' id='algorithm'/>
                            </div>
                            <div class='buttonRow'>
                            <button class='ButtonForm'> Добавить</button>
                            </div>
                            </form>");
                        }
                        }

                        function get_db(){
                        $conn =  connect_db();
                        $sql = "SELECT  classvirus.id, infection.infections, classvirus.habitat, classvirus.algorithm FROM infection
                                JOIN classvirus_infection ON infection.id=classvirus_infection.id_infection
                                JOIN classvirus ON classvirus_infection.id_classvirus=classvirus.id;";

                        echo "<table width='700px' border='2' cellpadding='5' cellspacing='0'>";
                        echo "<col width='200' valign='top'>";
                        echo "<col width='150' valign='top'>";
                        echo "<col width='150' valign='top'>";
                        echo "<colgroup>";
                        echo "<tbody class='borderClass'>";
                        if($result = $conn->query($sql)){
                            $rowsCount = $result->num_rows; // количество полученных строк
                            foreach($result as $row){
                                printf( "<form method='POST' action='remove_db.php'>
                                    <tr>
                                    <input type='hidden' name='id' value='%s'>
                                    <td>%s</td>
                                    <td>%s</td>
                                    <td>%s</td>
                                    <td> <button class='ButtonForm'>Удалить</button> </td>
                                    </tr>
                                    </form>", $row['id'], $row['infections'], $row['habitat'], $row['algorithm'] );
                            }

//                              echo "<td>" . "Получено объектов: $rowsCount" . "</td>";
                            $result->free();
                        }
                        echo "</tbody>";
                        echo "</colgroup>";
                        echo "</table>";
                    }
?>