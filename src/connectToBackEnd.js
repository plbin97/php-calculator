exports.post = (formula) => {
    let req = new XMLHttpRequest();
    req.open("POST","backEnd",true);
    req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    req.send("formula");
    req.addEventListener("load",() => {
        if (req.status !== 200) {
            callback(null);
        }else {
            let response = null;
            try {
                response = JSON.parse(req.responseText)
            }catch (e) {
                callback(null);
            }
            if (response.status === undefined) {
                callback(null);
            }else if (response.status != 0) {
                callback(null);
            }else {
                // Normal
                callback(response.authID);
            }
        }
    });
};
};