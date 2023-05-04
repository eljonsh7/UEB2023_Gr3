<?php echo '<div class="contentDiv' . $genre . '" style="margin-top:15%;">
                <div>
                    <div  class = "filmi" id="content'.$id.'">
                        <center>
                            <a href = "movie-details.php?id=' . $id . '&type=' . $type . '">
                                <img id="imgContent" src="' . $poster . '" alt="portfolio" class="imgContentPortfolio" style="border-radius:15px;"/>
                            </a>
                        </center>
                    </div>';
                        if(isset($_SESSION['user'])){
                            echo '<div class="transformers-right ';
                                if (in_array($id, $content_ids)) {
                                    echo 'watchlisted';
                                }
                                echo '" id="watchlist-button'.$id.'" onclick="list('.$id.')"></div>';
                            }
                            echo '
                    <div class="portfolio-content">
                        <a href = "movie-details.php?id=' . $id . '&type=' . $type . '">
                            <h5 style = "text-align:center;">' . $title . '</h5>
                        </a>
                    </div>
                </div>
            </div>';
?>