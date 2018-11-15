exports.calculate = (originalFormula,result) => {
    let finalFormula = originalFormula.replace(/√/g,"2&");
    require('./connectToBackEnd').post(finalFormula,(resultFromServer) => {
        result(resultFromServer);
    });
};