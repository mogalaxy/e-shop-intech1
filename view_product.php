<div class="container">
    <?php

        $connect = mysqli_connect('localhost', 'root','', 'shop_db');
        $query = 'SELECT * FROM products ORDER by id ASC';
        $result = mysqli_query($connect, $query);

            if ($result):
                if(mysqli_num_rows($result)>0):
                    while($product = mysqli_fetch_assoc($result)):
                    ?>
        <div class="col-sm-4 col-md-3">
            <form method="post" action="index.php?action=add&id=<?php echo $product['id']?>">
                <div class="products">
                    <img src="admin/<?php echo $product['image'];?> "/>
                    <h4 class="text-muted">
                    <?php echo $product['name'];?></h4>
                    <h4><?php echo $product['price'];?></h4>
                    <h4><?php echo $product['info'];?></h4>
                    <button><a href="<?php echo $product['redirect']?>">Buy</a></button>
                </div>
            </form>
        </div>
        <?php
                    endwhile;
                endif;
          endif;
            ?>
</div>