var options = {
    valueNames: ['book_id', 'title', 'author', 'publisher', 'issue_date', 'return_date']
};

var book_history = new List('book_history', options);

var bookId = $('#book_id-field'),
    titleField = $('#title-field'),
    authorField = $('#author-field'),
    publisherField = $('#publisher-field'),
    issueDateField = $('#issue_date-field'),
    returnDateField = $('#return_date-field'),
    addBtn = $('#add-btn');

addBtn.click(function() {
    book_history.add({
        title: titleField.val(),
        author: authorField.val(),
        issue_date: issueDateField.val(),
        return_date: returnDateField.val()
    });
    clearFields();
});

function clearFields(){
    titleField.val('');
    authorField.val('');
    issueDateField.val('');
    returnDateField.val('');
}