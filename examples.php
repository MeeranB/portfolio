<?php

include 'include/sidebar.php';

?>
        <main>
            <div class="container--main">
                <header class="examples-header">
                    <h1 class="examples-title">Coding Examples</h1>
                </header>
                <div class="content-container">
                    <article class="examples-content">
                        <div class="article-head">
                            <h2><span>Reusable cards with hover effect</span></h2>
                            <span class="note-container">(trivial style declarations have been excluded for brevity)</span>
                        </div>
                        <div class="demo-gif-container">
                            <img src="assets/images/info-card-demo.gif" alt="GIF demonstrating hover effect on a card" class="demo-gif">
                        </div>
                        <a href="https://gist.github.com/MeeranB/440d8bf3433b5188bbef7a0965a4d940" class="gist-button button" target="_blank">View code</a>
                        <details>
                            <summary>View HTML</summary>
                            <pre>
                                <code class="language-html line-numbers">
                                    &lt;div class=&quot;info-card info-card--apps&quot;&gt;
                                    &lt;div class=&quot;info-link&quot;&gt;
                                        &lt;div class=&quot;icon-container icon-container--apps&quot;&gt;
                                            &lt;span class=&quot;card-icon icon-apps&quot;&gt;&lt;/span&gt;
                                        &lt;/div&gt;
                                        &lt;div class=&quot;info-title-container&quot;&gt;
                                            &lt;span class=&quot;h2&quot;&gt;Bespoke Software&lt;/span&gt;
                                        &lt;/div&gt;
                                        &lt;div class=&quot;info-subtitle-container&quot;&gt;
                                            &lt;span class=&quot;p&quot;&gt;
                                                &lt;!-- Card content goes here --&gt;
                                            &lt;/span&gt;
                                        &lt;/div&gt;
                                        &lt;div class=&quot;btn-container&quot;&gt;
                                            &lt;span class=&quot;btn btn-software&quot;&gt;&lt;span&gt;Read More&lt;/span&gt;&lt;/span&gt;
                                        &lt;/div&gt;
                                    &lt;/div&gt;
                                &lt;/div&gt;
                                </code>
                            </pre>
                        </details>
                        <details>
                            <summary>View SCSS</summary>
                            <pre>
                                <code class="language-scss line-numbers">
                                    .info-card {
                                    box-shadow: 0 3px 35px rgb(0 0 0 / 10%);
                                    height: 100%;
                                    .btn-container {
                                        margin-top: auto;
                                    }
                                    .info-link {
                                        display: flex;
                                        flex-direction: column;
                                        height: 100%;
                                    }
                                    .icon-container {
                                        text-align: center;
                                        position: relative;
                                        .card-icon {
                                            color: white;
                                        }
                                        .card-icon::after {
                                            content: '';
                                            position: absolute;
                                            top: 0;
                                            left: calc(50% - 30px);
                                            width: 60px;
                                            height: 60px;
                                            border-radius: 50%;
                                        }
                                        .card-icon::before {
                                            //Places the icon over it's container
                                            position: relative;
                                            z-index: 1;
                                        }
                                    }
                                    &amp;:hover {
                                        //Remove color from elements
                                        .h2,
                                        .p {
                                            color: white;
                                        }
                                        .h2::after,
                                        .btn,
                                        .card-icon::after {
                                            background-color: white;
                                        }</code>
                                        .btn {
                                            border-color: white;
                                        }
                                    }
                                    @each $card-type, $color in $icon-colorscheme {
                                        //Invert color scheme for each info-card
                                        &amp;--#{$card-type}:hover {
                                            //Sets info-card background color
                                            background-color: $color;
                                            .btn,
                                            .icon-#{$card-type}::before {
                                                //Sets icon and buttons hover font
                                                color: $color;
                                            }
                                        }
                                        .icon-#{$card-type}::after {
                                            //Sets icon circle correctly
                                            background-color: $color;
                                        }
                                    }
                                }
                            </pre>
                        </details>
                        <details>
                            <summary>View Explanation</summary>
                            <br>
                            <p>
                                These SCSS rules provide an extendable framework to create CSS classes to style a card with the demonstrated hover effect 
                            </p>
                            <span class="explanation-title">The SASS each-loop</span>
                            <p>
                                The extendable element of the SCSS rules is the ability to create other CSS modifier classes to provide a different color scheme for various parts of the given card. These modifier classes, info-card--apps and icon-container--apps can be seen on lines 1 and 3 of the HTML
                            </p>
                            <p>
                                In order to generate a new color scheme for a new card, we add a new pair to the $icon-colorscheme SASS map, where the key is a label for the color scheme and where the value is the color to be applied to the card. For example, adding the pair ("display": #4183d7") to the map generates the classes info-card--display and icon-container--display through the each loop from lines 48 to 63 of the SCSS code.
                            </p>
                            <p>
                                The newly created modifier classes provide a hover state for a card that changes the card background color, the button and icon's text color, and the icon container's background to the respective color scheme within the loop by parsing the ("display": #4183d7") pair and using "display" as the value for $card-type and "#4183d7" as the hex value for $color.
                            </p>
                            <span class="explanation-title">Other notable features</span>
                            <p>
                                The rules outside of the each loop represent card features that do not change when a new color scheme is provided
                            </p>
                            <p>
                                Line 22 demonstrates a common technique for centering elements. By shifting the span behind the icon, represented by ".card-icon::after", using the left property by 50% we place the span such that it begins half the width of the containing element, in this case this is the width of the card itself.
                                This places the span such that the left edge is centered, rather than centering the span itself. In order to correct this we use calc to subtract half of the width of the span from our current left position, this shifts the span to the right and sets the center of the span to the horizontal center of the card itself
                            </p>
                            <p>
                                Lines 35 to 38 of the SCSS code represent the coloring of the card title and card paragraph text to white on hover
                            </p>
                            <p>
                                Lines 39 to 43 represent the coloring of the title separating span, card button and icon container's to white on hover, and lines 44 to 46 affect the button's border.
                            </p>
                        </details>
                        <div class="article-head">
                            <h2><span>SQL Query</span></h2>
                            <span class="note-container">A demonstration of SQL understanding using the below schema</span>
                        </div>
                        <div class="demo-gif-container">
                            <img src="assets/images/movie-database.png" alt="Movie database schema" class="demo-schema">
                        </div>
                        <details>
                            <summary>View Query</summary>
                            <pre>
                                <code class="language-sql line-numbers">
                                    SELECT reviewer.rev_id, reviewer.rev_name AS reviewer_name, ROUND(AVG(rating.rev_stars), 2) AS average_rating
                                    FROM reviewer
                                    JOIN rating 
                                    ON reviewer.rev_id = rating.rev_id
                                    WHERE rating.rev_stars IS NOT NULL AND rev_name IS NOT NULL
                                    GROUP BY reviewer.rev_id
                                    ORDER BY average_rating DESC LIMIT 5
                                </code>
                            </pre>
                        </details>
                        <details>
                            <summary>View Explanation</summary>
                            <br>
                            <span class="explanation-title">Data report use case</span>
                            <p>
                                As part of a scheme to encourage users of the movie application, we want to reward those that enjoyed our movies the most, and as such we require a well formatted data report that may be queried in order to generate emails to be sent out to these users.
                            </p>
                            <span class="explanation-title">Query breakdown</span>
                            <p>
                                This data report requires that we generate a list of the users that rate moviews the highest when using the rating system, therefore our report will require information from both the reviewer and ratings table.
                            </p>
                            <p>
                                To generate this intermediate table, we would run the following query to join the reviewers table to the ratings table utilising the rev_id key constraint.
                            </p>
                            <pre>
                                <code class="language-sql line-numbers">
                                    SELECT * FROM reviewer
                                    JOIN rating
                                    ON reviewer.rev_id = rating.rev_id
                                </code>
                            </pre>
                            <p>
                                We utilise an inner join in this instance as we want to ensure that we return a data report where there is available data for both the reviewer and the rating itself, if we were for instance to do a LEFT OUTER JOIN instead, we may have reviewer information returned which do not have associated rating data, due to some reviewers not having reviewed a movie yet.
                            </p>
                            <p>
                                The next step is to ensure that we get only the relevant columns for our query, remembering to ensure that we are not ambigious with our column descriptions in our select statement by specifying which of the initial tables we are referring to when selecting the columns.
                            </p>
                            <pre>
                                <code class="language-sql line-numbers">
                                    SELECT reviewer.rev_id, reviewer.rev_name, rating.rev_stars FROM reviewer
                                    JOIN rating
                                    ON reviewer.rev_id = rating.rev_id
                                </code>
                            </pre>
                            <p>
                                This table now contains more relevant data, however it may return rows with missing data for either the reviewer name, or the reviewer rating as there is no constraint within the schema that dictates that these fields must be populated. In our use case, entries with either of these fields missing will be unusable as meaningful user emails cannot be sent without this information, and as such we should filter them from our report
                            </p>
                            <pre>
                                <code class="language-sql line-numbers">
                                    SELECT reviewer.rev_id, reviewer.rev_name, rating.rev_stars FROM reviewer
                                    JOIN rating
                                    ON reviewer.rev_id = rating.rev_id
                                    WHERE reviewer.rev_name IS NOT NULL AND rating.rev_stars IS NOT NULL
                                </code>
                            </pre>
                            <p>
                                At this point we have a report containing every review with an associated rating and user listed, in order to handle the case where users have made multiple reviews we shall take an average of their ratings to get a representative number for to be used in their email. We do this using the AVG SQL function, combined with the ROUND function in order to ensure that the report generates user friendly decimals.
                            </p>
                            <p>
                                We use the aggregate average function combined with the GROUP BY syntax in order to convert our report to show the average reviewer rating by reviewer_id, and we ensure to use a column entry that is guaranteed to be unique within our dataset so that we do not combine users' ratings in the instance where they have provided the same name.

                                We provide a secondary argument to the ROUND function to ensure a consistent number of decimal places within our report.
                            </p>
                            <pre>
                                <code class="language-sql line-numbers">
                                    SELECT reviewer.rev_id, reviewer.rev_name, ROUND(AVG(rating.rev_stars), 2) FROM reviewer
                                    JOIN rating
                                    ON reviewer.rev_id = rating.rev_id
                                    WHERE reviewer.rev_name IS NOT NULL AND rating.rev_stars IS NOT NULL
                                    GROUP BY reviewer.rev_id
                                </code>
                            </pre>
                            <p>
                                Finally we must name our report columns concisely so they can be more easily referred to when generating the emails. We also order our results and use a LIMIT statement to only retrieve the most highest rating users as required by our use case.
                            </p>
                            <pre>
                                <code class="language-sql line-numbers">
                                    SELECT reviewer.rev_id, reviewer.rev_name AS reviewer_name, ROUND(AVG(rating.rev_stars), 2) AS average_rating
                                    FROM reviewer
                                    JOIN rating
                                    ON reviewer.rev_id = rating.rev_id
                                    WHERE rating.rev_stars IS NOT NULL AND rev_name IS NOT NULL
                                    GROUP BY reviewer.rev_id
                                    ORDER BY average_rating DESC LIMIT 5
                                </code>
                            </pre>
                        </details>
                        <details>
                            <summary>View Report</summary>
                            <table>
                                <tr>
                                  <th>rev_id</th>
                                  <th>reviewer_name</th>
                                  <th>average_rating</th>
                                </tr>
                                <tr>
                                  <td>9007</td>
                                  <td>Simon Wright</td>
                                  <td>8.60</td>
                                </tr>
                                <tr>
                                    <td>9019</td>
                                    <td>Brandt Sponseller</td>
                                    <td>8.40</td>
                                </tr>
                                <tr>
                                    <td>9003</td>
                                    <td>Flagrant Baronessa</td>
                                    <td>8.30</td>
                                </tr>
                                <tr>
                                    <td>9010</td>
                                    <td>Mike Salvati</td>
                                    <td>8.10</td>
                                  </tr>
                                  <tr>
                                    <td>9017</td>
                                    <td>Hannah Steele</td>
                                    <td>8.10</td>
                                  </tr>
                              </table>                              
                        </details>
                        <div class="article-head">
                            <h2><span>PHP Form Response</span></h2>
                            <span class="note-container">
                                On submission of this sites' contact form, it is necessary to additionally validate form inputs within a server-side script despite any client-side validation present, as a malicious user can easily bypass client-side validation. When the form is submitted, Axios is used to send a POST request to a PHP script that posts sanitised and escaped form data to a database. <br><br>This script also generates a JSON object response containing information on the the pass state of each form inputs validity criteria, and booleans confirming that the form's validity state as a whole and whether the form data was successfully submitted to the database. This is an excerpt of that script:
                            </span>
                        </div>
                        <details>
                            <summary>View Script</summary>
                            <pre>
                                <code class="language-php line-numbers">
                                function checkValidEntries($formValidation) {
                                    foreach ($formValidation as $formInput => $validityCriteria) {

                                        //Retrieve validity test results from each input's validity criteria as unassociated array
                                        $validityResults = array_values($validityCriteria);

                                        //Computes if all validation passes
                                        $allTestsPass = array_unique($validityResults) === array(true);

                                        //Alternate computation for single validation tests
                                        $singleTestPass = $validityResults === [true];

                                        if (count($validityCriteria) > 1 && !($allTestsPass)) {
                                            return false;
                                        } else if (count($validityCriteria) == 1 && !($singleTestPass)) {
                                            return false;
                                        }
                                    }
                                    return true;
                                }


                                try {
                                    $_POST = json_decode(file_get_contents("php://input"), true);
                                    $formValidation = array_fill_keys(array_keys($_POST), array());
                                    if (isValidEmail($_POST['email'])) {
                                        $formValidation['email']['valid'] = true;
                                    } else {
                                        $formValidation['email']['valid'] = false;
                                    }
                                    foreach ($_POST as $entry => $input) {
                                        if(empty($input)) {
                                            $formValidation[$entry]['filled'] = false;
                                        }
                                        else if (!empty($input)) {
                                            $formValidation[$entry]['filled'] = true;
                                        }
                                    }
                                    $validForm = checkValidEntries($formValidation);

                                    if ($validForm) {
                                        /*
                                        Escape and sanitize input, 
                                        bind parameters using a prepared statement, 
                                        then execute prepared statement
                                        */

                                        $submitted = true;
                                    }


                                    echo json_encode(
                                        array( 
                                                'formValidation' => $formValidation,
                                                'validForm' => $validForm,
                                                'submitted' => $submitted
                                            )
                                    );
                                }
                                </code>
                            </pre>
                        </details>
                        <details>
                            <summary>View Explanation</summary>
                            <br>
                            <span class="explanation-title">Validating the form inputs</span>
                            <p>
                                Execution begins on line 24 where we populate the predefined $_POST variable by retrieving the data from the php input stream, which is accessed when the POST axios request is made, JSON decoding is necessary here to create an associative array that can be assigned to our $_POST variable.
                            </p>
                            <p>
                                We then initialise a $formValidation associative array which will be used as part of our PHP response, it is initialised with the same keys as our $_POST variable and with empty arrays as the values as seen below.
                            </p>
                            <pre>
                                <code class="language-php">
                                    $formValidation = {
                                        'fname'=>array(),
                                        'lname'=>array(),
                                        'subject'=>array(),
                                        'email'=>array(),
                                        'message'=>array()
                                    }
                                </code>
                            </pre>
                            <p>
                                On lines 26-30 we validate the data within $_POST['email'] by calling our validation function, this function checks whether it matches a given regular expression, depending on whether this passes or fails we assign to the $formValidation array like so:
                            </p>
                            <pre>
                                <code class="language-php">
                                    $formValidation = {
                                        ...
                                        'email' => {
                                            'valid' => //true or false
                                        }
                                        ...
                                    }
                                </code>
                            </pre>
                            <p>
                                Between lines 31 to 38 we continue the validation process by looping through the $_POST array to confirm that the fields are not empty and updating the $formValidation array appropriately.
                            </p>
                            <pre>
                                <code class="language-php">
                                    $formValidation = {
                                        'fname' => {
                                            'filled' => //true or false
                                        }
                                        'lname' => {
                                            'filled' => //true or false
                                        }
                                        'email' => {
                                            'valid' => //true or false
                                            'filled' => //true or false
                                        }
                                        'subject' => {
                                            'filled' => //true or false
                                        }
                                        'message' => {
                                            'filled' => //true or false
                                        }
                                    }
                                </code>
                            </pre>
                            <p>
                                This populated validation array is then passed to our checkValidEntries function, this function summarises the validation by returning a boolean confirming the overall validity of the form.
                            </p>
                            <span class="explanation-title">Aggregating validation states</span>
                            <p>
                                We iterate through our $formValidation array, and for each form input we assign a $validationResults variable, which is computed by accessing the input's validation criteria array, and retrieving only the values of this array.
                            </p>
                            <pre>
                                <code class="language-php">

                                    //if email is the current $formValidation input being accessed

                                    'email' => {
                                        valid => false,
                                        filled => true
                                    }

                                    //will have it's array values accessed and assigned like:

                                    $validationResults = array(false, true);

                                </code>
                            </pre>
                            <p>
                                Using the $validationResults array we compute whether $allTestsPass by removing any duplicate entries and comparing it to an array containing only the value of true. If the $validationResults array contains anything but true values, they will not be removed by array_unique() and as such will assign false to our $allTestsPass variable.
                            </p>
                            <pre>
                                <code class="language-php">

                                    $validationResults = array(false, true);

                                    //calling array_unique removes any duplicate array values and produces:

                                    $validationResults = array(false, true);

                                    $allTestsPass = array(false, true) === array(true);

                                    $allTestsPass = false;

                                </code>
                            </pre>
                            <p>
                                We must handle form input with only single validation criteria differently, as calling array_values on an associative array of size 1 is not handled correctly by the function. We compute this by directly comparing the $validationResults to an array containing true, this assigns false if the test fails and true if it passes.
                            </p>
                            <p>
                                Finally we combine these calculations to handle each form input's validation criteria by using either the multiple tests calculations to return false if any tests fail, or to use the single test calculation to do the same.
                            </p>
                            <p>
                                If no formValidation criteria return false, we can assume that the form is valid and we may return true.
                                It is worth noting here, that this solution could be improved by being written recursively, this would allow further nesting within our $formValidation array.
                            </p>
                            <span class="explanation-title">Generating the response object</span>
                            <p>
                                Having returned the form validation state to $validForm, we submit the valid form and set our $submitted variable, and can then encode each of $formValidation, $validForm and $submitted into JSON to be returned by the post request.
                            </p>
                            <p>
                                This JSON object will become available from our Axios call if the POST request was successful, if the POST request fails, the response will either not contain the response object or the response object will list why failure occurs. In either case this can be handled by throwing an error to be caught and handled in our Axios call.
                            </p>
                        </details>
                    </article>
                </div>
            </div>
        </main>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-sidebar/3.3.2/jquery.sidebar.min.js"></script>
    <script src="assets/js/prism.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>