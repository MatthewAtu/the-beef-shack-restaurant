<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Reviewsstyle.css">
    <title>Restaurant Reviews</title>
   
</head>
<body>
    <!-- Global Header to be included on all web pages -->
    <!-- Nav is used for more semantic markup to let search engines know that this is our header-->
    <nav id="global-header">
        <div>
            <!-- Logo linking to the home page -->
            <a href="../home-page.html">
                <img src="../imgs/beef-shack.png" alt="The Beef Shack Logo" id="logo">
            </a>
            <!-- Navigation Links -->
            <div id="nav-links">
                <a href="../menu/OurMenu.html">Menu</a>
                <a href="../locations.html">Locations</a>
                <a href="../reveiw/Reviews.php">Reviews</a>
                <a href="../careers/careers.html">Careers</a>
                <a href="../feedback/feedback.html">Feedback</a>
                <a href="../faq.html">FAQ</a>
            </div>
            <!-- Special styling for order button -->
            <div id="order-button">
                <a href="../order/Order.html">ORDER NOW</a>
            </div>
        </div>
    </nav>

    <!-- <header>
        <h1>Restaurant Reviews</h1>
        <p>We value your feedback!</p>
    </header> -->

    <div class="container">
        <h2>Submit Your Review</h2>
         <p>We value your feedback!</p>
        <form id="review-form" action="../connect.php" method="post">
            <label for="name">Your Name:</label>
            <input type="text" id="name" placeholder="Enter your name" name="entered-name" required>

            <label for="rating">Rating:</label>
            <select id="rating" name="rating" required>
                <option value="">Select a rating</option>
                <option value="5">5 - Excellent</option>
                <option value="4">4 - Very Good</option>
                <option value="3">3 - Good</option>
                <option value="2">2 - Fair</option>
                <option value="1">1 - Poor</option>
            </select>

            <label for="review">Your Review:</label>
            <textarea id="review" rows="5" placeholder="Write your review here..." name="review-text" required></textarea>

            <button type="submit" name="submit-review">Submit Review</button>
        </form>

        <div id="reviews-section">
            <h2>Customer Reviews</h2>
            <div class="entered-reviews">
                <?php 
                    $dbc = mysqli_connect('localhost', 'root', '', 'careers');

                    $sql1 = "SELECT * FROM `review`";
                    $result1 = mysqli_query($dbc, $sql1) or die("bad query: $sql");

                    while($row = $result1->fetch_assoc()){
                        echo"<div class='reviews-entered'>";
                        echo "<p><strong>{$row['CustomerName']}</strong>: {$row['Rating']} out of 5</p>"." Comments:"."<br>".$row["ReviewText"]."<br>"."<br>";
                        echo"</div>";
                    }
                    $dbc->close();
                ?>
            </div>
        </div>
    </div>
     <!-- Global footer to be included on all web pages -->
     <footer id="global-footer">
        <!-- Nav is used for more semantic markup to let search engines know that this is our header-->
        <nav class="global-footer-container">
            <!-- Other Webpages List -->
            <div class="footer-column">
                <h3>Quick Links</h3>
                <ul>
                <li><a href="../home-page.html">Home</a></li>
                    <li><a href="../menu/OurMenu.html">Menu</a></li>
                    <li><a href="../locations.html">Locations</a></li>
                    <li><a href="../reveiw/Reviews.php">Reviews</a></li>
                    <li><a href="apply.html">Apply</a></li>
                    <li><a href="../feedback/feedback.html">Feedback</a></li>
                    <li><a href="faq.html">FAQ</a></li>
                </ul>
            </div>
            <!-- Contact Info List -->
            <div class="footer-column">
                <h3>Contact Us</h3>
                <ul>
                    <li>Email: contact@thebeefshack.com</li>
                    <li>Phone: +1-800-123-4567</li>
                </ul>
            </div>
            <!-- Social Media List -->
            <div class="footer-column">
                <h3>Follow Us</h3>
                <ul>
                    <li><a href="../no-social.html" target="_blank">Facebook</a></li>
                    <li><a href="../no-social.html" target="_blank">Twitter</a></li>
                    <li><a href="../no-social.html" target="_blank">Instagram</a></li>
                    <li><a href="../no-social.html" target="_blank">LinkedIn</a></li>
                </ul>
            </div>
        </nav>
        <div class="footer-bottom">
            <p id="copyright-global-footer">&copy; 2024 The Beef Shack. All Rights Reserved.</p>
        </div>
    </footer>    
</body>
</html>
