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
                            <img src="/assets/images/info-card-demo.gif" alt="GIF demonstrating hover effect on a card" class="demo-gif">
                        </div>
                        <a href="https://gist.github.com/MeeranB/440d8bf3433b5188bbef7a0965a4d940" class="gist-button button" target="_blank">View code</a>
                        <details>
                            <summary>View HTML</summary>
                            <pre class="code">
<code>&lt;div class=&quot;info-card info-card--apps&quot;&gt;</code>
<code>    &lt;div class=&quot;info-link&quot;&gt;</code>
<code>        &lt;div class=&quot;icon-container icon-container--apps&quot;&gt;</code>
<code>            &lt;span class=&quot;card-icon icon-apps&quot;&gt;&lt;/span&gt;</code>
<code>        &lt;/div&gt;</code>
<code>        &lt;div class=&quot;info-title-container&quot;&gt;</code>
<code>            &lt;span class=&quot;h2&quot;&gt;Bespoke Software&lt;/span&gt;</code>
<code>        &lt;/div&gt;</code>
<code>        &lt;div class=&quot;info-subtitle-container&quot;&gt;</code>
<code>            &lt;span class=&quot;p&quot;&gt;</code>
<code>                &lt;!-- Card content goes here --&gt;</code>
<code>            &lt;/span&gt;</code>
<code>        &lt;/div&gt;</code>
<code>        &lt;div class=&quot;btn-container&quot;&gt;</code>
<code>            &lt;span class=&quot;btn btn-software&quot;&gt;&lt;span&gt;Read More&lt;/span&gt;&lt;/span&gt;</code>
<code>        &lt;/div&gt;</code>
<code>    &lt;/div&gt;</code>
<code>&lt;/div&gt;</code>
                            </pre>
                        </details>
                        <details>
                            <summary>View SCSS</summary>
                            <pre class="code">
<code>.info-card {</code>
<code>    box-shadow: 0 3px 35px rgb(0 0 0 / 10%);</code>
<code>    height: 100%;</code>
<code>    .btn-container {</code>
<code>        margin-top: auto;</code>
<code>    }</code>
<code>    .info-link {</code>
<code>        display: flex;</code>
<code>        flex-direction: column;</code>
<code>        height: 100%;</code>
<code>    }</code>
<code>    .icon-container {</code>
<code>        text-align: center;</code>
<code>        position: relative;</code>
<code>        .card-icon {</code>
<code>            color: white;</code>
<code>        }</code>
<code>        .card-icon::after {</code>
<code>            content: '';</code>
<code>            position: absolute;</code>
<code>            top: 0;</code>
<code>            left: calc(50% - 30px);</code>
<code>            width: 60px;</code>
<code>            height: 60px;</code>
<code>            border-radius: 50%;</code>
<code>        }</code>
<code>        .card-icon::before {</code>
<code class="optional">            //Places the icon over it's container</code>
<code>            position: relative;</code>
<code>            z-index: 1;</code>
<code>        }</code>
<code>    }</code>
<code>    &amp;:hover {</code>
<code>        //Remove color from elements</code>
<code>        .h2,</code>
<code>        .p {</code>
<code>            color: white;</code>
<code>        }</code>
<code>        .h2::after,</code>
<code>        .btn,</code>
<code>        .card-icon::after {</code>
<code>            background-color: white;</code>
<code>        }</code>
<code>        .btn {</code>
<code>            border-color: white;</code>
<code>        }</code>
<code>    }</code>
<code>    @each $card-type, $color in $icon-colorscheme {</code>
<code class="optional">        //Invert color scheme for each info-card</code>
<code>        &amp;--#{$card-type}:hover {</code>
<code class="optional">            //Sets info-card background color</code>
<code>            background-color: $color;</code>
<code>            .btn,</code>
<code>            .icon-#{$card-type}::before {</code>
<code class="optional">                //Sets icon and buttons hover font</code>
<code>                color: $color;</code>
<code>            }</code>
<code>        }</code>
<code>        .icon-#{$card-type}::after {</code>
<code>            //Sets icon circle correctly</code>
<code>            background-color: $color;</code>
<code>        }</code>
<code>    }</code>
<code>}</code>
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
                            <img src="/assets/images/movie-database.png" alt="Movie database schema" class="demo-schema">
                        </div>
                        <details>
                            <summary>View Query</summary>
                            <pre class="code">
<code>SELECT reviewer.rev_id, reviewer.rev_name AS reviewer_name, ROUND(AVG(rating.rev_stars), 2) AS average_rating</code>
<code>FROM reviewer</code>
<code>JOIN rating</code> 
<code>ON reviewer.rev_id = rating.rev_id</code>
<code>WHERE rating.rev_stars IS NOT NULL AND rev_name IS NOT NULL</code>
<code>GROUP BY reviewer.rev_id</code>
<code>ORDER BY average_rating DESC LIMIT 5</code>
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
                            <pre class="code">
<code>SELECT * FROM reviewer</code>
<code>JOIN rating</code>
<code>ON reviewer.rev_id = rating.rev_id</code>
                            </pre>
                            <p>
                                We utilise an inner join in this instance as we want to ensure that we return a data report where there is available data for both the reviewer and the rating itself, if we were for instance to do a LEFT OUTER JOIN instead, we may have reviewer information returned which do not have associated rating data, due to some reviewers not having reviewed a movie yet.
                            </p>
                            <p>
                                The next step is to ensure that we get only the relevant columns for our query, remembering to ensure that we are not ambigious with our column descriptions in our select statement by specifying which of the initial tables we are referring to when selecting the columns.
                            </p>
                            <pre class="code">
<code>SELECT reviewer.rev_id, reviewer.rev_name, rating.rev_stars FROM reviewer</code>
<code>JOIN rating</code>
<code>ON reviewer.rev_id = rating.rev_id</code>
                            </pre>
                            <p>
                                This table now contains more relevant data, however it may return rows with missing data for either the reviewer name, or the reviewer rating as there is no constraint within the schema that dictates that these fields must be populated. In our use case, entries with either of these fields missing will be unusable as meaningful user emails cannot be sent without this information, and as such we should filter them from our report
                            </p>
                            <pre class="code">
<code>SELECT reviewer.rev_id, reviewer.rev_name, rating.rev_stars FROM reviewer</code>
<code>JOIN rating</code>
<code>ON reviewer.rev_id = rating.rev_id</code>
<code>WHERE reviewer.rev_name IS NOT NULL AND rating.rev_stars IS NOT NULL</code>
                            </pre>
                            <p>
                                At this point we have a report containing every review with an associated rating and user listed, in order to handle the case where users have made multiple reviews we shall take an average of their ratings to get a representative number for to be used in their email. We do this using the AVG SQL function, combined with the ROUND function in order to ensure that the report generates user friendly decimals.
                            </p>
                            <p>
                                We use the aggregate average function combined with the GROUP BY syntax in order to convert our report to show the average reviewer rating by reviewer_id, and we ensure to use a column entry that is guaranteed to be unique within our dataset so that we do not combine users' ratings in the instance where they have provided the same name.

                                We provide a secondary argument to the ROUND function to ensure a consistent number of decimal places within our report.
                            </p>
                            <pre class="code">
<code>SELECT reviewer.rev_id, reviewer.rev_name, ROUND(AVG(rating.rev_stars), 2) FROM reviewer</code>
<code>JOIN rating</code>
<code>ON reviewer.rev_id = rating.rev_id</code>
<code>WHERE reviewer.rev_name IS NOT NULL AND rating.rev_stars IS NOT NULL</code>
<code>GROUP BY reviewer.rev_id</code>
                            </pre>
                            <p>
                                Finally we must name our report columns concisely so they can be more easily referred to when generating the emails. We also order our results and use a LIMIT statement to only retrieve the most highest rating users as required by our use case.
                            </p>
                            <pre class="code">
<code>SELECT reviewer.rev_id, reviewer.rev_name AS reviewer_name, ROUND(AVG(rating.rev_stars), 2) AS average_rating</code>
<code>FROM reviewer</code>
<code>JOIN rating</code> 
<code>ON reviewer.rev_id = rating.rev_id</code>
<code>WHERE rating.rev_stars IS NOT NULL AND rev_name IS NOT NULL</code>
<code>GROUP BY reviewer.rev_id</code>
<code>ORDER BY average_rating DESC LIMIT 5</code>
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
                    </article>
                </div>
            </div>
        </main>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-sidebar/3.3.2/jquery.sidebar.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>