<style>
.btn {
    background-color: #3a444f;
    border-width: 0;
}

.btn:hover,
.btn:active {
    background-color: transparent;
    border-width: 3px;
    border-color: white;
}
</style>

<?php
if ($pages > 1) {
    echo '<section>
    <center>
         <div class="container">';

    if (isset($_GET['genre'])) {
        for ($i = 1; $i <= $pages; $i++) {
            echo '<a style = "margin-right: 5px;" class = "btn btn-primary btn-lg';
            if ($i != $page) {
                echo 'btn-floating"';
            } else {
                echo '"';
            }
            echo 'href="' . $site . '.php?page=' . $i . '&genre=' . $genreGET . '">' . $i . '</a>';
        }
    } else {
        for ($i = 1; $i <= $pages; $i++) {
            echo '<a style = "margin-right: 5px;" class = "btn btn-primary btn-lg';
            if ($i != $page) {
                echo 'btn-floating"';
            } else {
                echo '"';
            }
            echo 'href="' . $site . '.php?page=' . $i . '">' . $i . '</a>';
        }
    }
    echo '</div>
    <center>
     </section>';
}