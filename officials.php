<?php
    include_once 'header.php';
?>

<section class="officials">

    <div class="container-fluid" style="background-color: #3f7652">     
        <h1 class="display-3 fw-bold p-4 text-center text-white">BARANGAY OFFICIALS</h1>
    </div>

    <?php
        try {
            include_once 'includes/connect.inc.php';
        
            $sql = "SELECT * FROM officials WHERE official_type='barangay captain' AND active='1'";
        
            $q = $conn->query($sql);
            $q->setFetchMode(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Could not connect to the database $dbname :" . $e->getMessage());
        }
    ?>
    <div class="container pt-5">
        <div class="row row-cols-1 row-cols-md-3 g-4 pt-2 justify-content-center">
            <?php while ($row = $q->fetch()): 
                $officialImageURL = 'assets/officials/'.$row["official_image"];
            ?>
                <div class="col">
                    <div class="card p-3 h-100 border-1 border-success">
                        <img src="<?php echo $officialImageURL; ?>" class="card-img-top rounded-circle h-100" alt="...">
                        <div class="card-body text-center">
                            <h3 class="card-title fw-bold"><?php echo $row['official_name']; ?></h3>
                            <p class="card-text"><?php echo $row['official_position']; ?></p>
                        </div>
                    </div>
                </div>
            <?php 
                endwhile; 
            ?>                
        </div>
    </div>

    <?php
        try {
            include_once 'includes/connect.inc.php';
        
            $sql = "SELECT * FROM officials WHERE official_type!='barangay captain' AND active='1'";
        
            $q = $conn->query($sql);
            $q->setFetchMode(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Could not connect to the database $dbname :" . $e->getMessage());
        }
    ?>
    <div class="container py-5">
        <div class="row row-cols-1 row-cols-md-3 g-4 pt-2">
            <?php while ($row = $q->fetch()): 
                $officialImageURL = 'assets/officials/'.$row["official_image"];
            ?>
                <div class="col">
                    <div class="card p-3 h-100 border-1 border-success">
                        <img src="<?php echo $officialImageURL; ?>" class="card-img-top rounded-circle  h-100" alt="...">
                        <div class="card-body text-center">
                            <h3 class="card-title fw-bold"><?php echo $row['official_name']; ?></h3>
                            <p class="card-text"><?php echo $row['official_position']; ?></p>
                        </div>
                    </div>
                </div>
            <?php 
                endwhile; 
            ?>                
        </div>
    </div>

</section>