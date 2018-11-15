exports.post = (formula,callback) => {
    let req = new XMLHttpRequest();
    req.open("POST","backEnd/index.php",true);
    req.send(formula);
    req.onload = () => {
        if (req.status === 200) {
            if (req.responseText === "Error")  {
                callback(false);
            }else{
                callback(req.responseText);
            }
        }else{
            callback(false);
        }
    };

    req.timeout = 5000;
    req.ontimeout = () => {
        callback(false);
    }
};