<?php
                            include 'config.php';

                            if (!isset($_GET['id'])) {
                                die('ID not provided.');
                            }

                            $id = $_GET['id'];

                            // Fetch the record
                            $stmt = $con->prepare("SELECT * FROM images WHERE id = ?");
                            $stmt->bind_param("i", $id);
                            $stmt->execute();
                            $result = $stmt->get_result();
                            $row = $result->fetch_assoc();
                            $stmt->close();

                            if (!$row) {
                                die("Record not found.");
                            }

                            echo "Name: " . htmlspecialchars($row["title"]) . "<br/>";
                            echo "Image: <img src='" . htmlspecialchars($row['image']) . "' alt='Image'><br/>";
                            ?>