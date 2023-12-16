<?php
$json = '[
{
"title": "The Catcher in the Rye",
"author": "J.D. Salinger",
"publication_year": 1951,
"category": "Fiction"
},
{
"title": "To Kill a Mockingbird",
"author": "Harper Lee",
"publication_year": 1960,
"category": "Fiction"
},
{
"title": "1984",
"author": "George Orwell",
"publication_year": 1949,
"category": "Dystopian"
},
{
"title": "The Great Gatsby",
"author": "F. Scott Fitzgerald",
"publication_year": 1925,
"category": "Fiction"
},
{
"title": "Brave New World",
"author": "Aldous Huxley",
"publication_year": 1932,
"category": "Dystopian"
}
]';

$books = json_decode($json, true);
//var_dump($books);

$booksByCategory = array();
foreach ($books as $book) {
    $category = $book['category'];
    $booksByCategory[$category][] = $book;
}

//var_dump($booksByCategory);

echo '<table border="1">';
echo '<tr>';
foreach ($booksByCategory as $category => $books) {
    echo '<th>' . $category . '</th>';
}
echo '</tr>';
$maxRowCount = max(array_map('count', $booksByCategory));
for ($i = 0; $i < $maxRowCount; $i++) {
    echo '<tr>';
    foreach ($booksByCategory as $category => $books) {
        if (isset($books[$i])) {
            $book = $books[$i];
            echo '<td>' . $book['title'] . ' by ' . $book['author'] . ' (' . $book['publication_year'] . ')</td>';
        } else {
            echo '<td></td>';
        }
    }
    echo '</tr>';
}
echo '</table>';