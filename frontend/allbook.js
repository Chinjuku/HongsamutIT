function togglePopup(bookName, bookOwner, imgSrc, bookId, userType, likeAmount) {
    var popup = document.getElementById('popup');
    var popupContent = document.getElementById('popup-content');
                        
    var popupcoN =
                            '<span class="popup-close" onclick="closePopup()">X</span>' +
                            
                            '<div class="square2"></div>' +
                            '<img class="popup-pic" src="' + imgSrc + '" alt="Image">' + '<br>' +
                            '<h1 class="popup-bookname">' + bookName + '</h1>' +
                            '<p class="popup-author">by ' + ' ' + bookOwner + '</p>'+
                            '<form action="./reviewbook.php" method="post">'+
                            '<input type="hidden" name="book_id" value="' + bookId + '">' +
                            '<p class="popup-like">' + ' ' + '<button class="fas fa-heart"></button>'+
                            ' '+ likeAmount + ' likes</p></input></form>';
                            if (userType == 1) {
                                popupcoN += '<div class = "pop_button_contain">'+
                                '<form action="../backend/borrow.php" method="post">' +
                                '<input type="hidden" name="book_id" value="' + bookId + '">' +
                                '<button type="submit" class="clicktoborrow1">BORROW NOW</button></input></form></div>'+
                                '<div class = "pop_button_contain">'+
                                '<form action="./reviewbook.php" method="post">' +
                                '<input type="hidden" name="book_id" value="' + bookId + '">' +
                                '<button type="submit" class="clicktoborrow2">REVIEW</button></input></form>' + '</div>';
                            }
                            
                            popupContent.innerHTML = popupcoN;
                            // '<button type="submit" class="clicktoborrow">BORROW NOW</button>' + 
                            // '</form>';

    popup.style.display = 'flex';
}

function closePopup() {
    var popup = document.getElementById('popup');
    popup.style.display = 'none';
}

