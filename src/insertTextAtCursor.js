exports.insert = (text) =>{
    /**
     * For  Insert some thing at cursor.
     * @param text Thing that you gona add/
     */
    let selection = window.getSelection();
    let range = selection.getRangeAt(0);
    range.deleteContents();
    let node = document.createTextNode(text);
    range.insertNode(node);

    for(let position = 0; position !== text.length; position++)
    {
        selection.modify("move", "right", "character");
    }
};