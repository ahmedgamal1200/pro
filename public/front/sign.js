let mo=document.getElementById('mo')
let moo=document.getElementById('moo')

mo.onclick=function(){
    
moo.style.display="block"



}
function calculateANOVA() {
    const rows = document.querySelectorAll("#dataTable tbody tr");
    let grandTotal = 0;
    let totalObservations = 0;
    const groupSums = [];
    const groupAvgs = [];
    const allValues = [];

    rows.forEach(row => {
        const inputs = row.querySelectorAll("input[type='number']");
        const sumCell = row.querySelector(".sum");
        const avgCell = row.querySelector(".avg");

        let groupSum = 0;
        let groupValues = [];
        inputs.forEach(input => {
            const value = parseFloat(input.value);
            groupSum += value;
            allValues.push(value);
            groupValues.push(value);
        });

        const groupAvg = groupSum / inputs.length;
        groupSums.push(groupSum);
        groupAvgs.push(groupAvg);

        sumCell.textContent = groupSum.toFixed(2);
        avgCell.textContent = groupAvg.toFixed(2);

        grandTotal += groupSum;
        totalObservations += inputs.length;
    });

    const overallAvg = grandTotal / totalObservations;
    document.getElementById("totalSum").textContent = grandTotal.toFixed(2);
    document.getElementById("overallAvg").textContent = overallAvg.toFixed(2);

    // حساب SSTR (مجموع التباين بين المجموعات)
    let SSTR = 0;
    const groupSize = 5;
    groupAvgs.forEach(avg => {
        SSTR += groupSize * Math.pow(avg - overallAvg, 2);
    });

    // حساب SSTO (التباين الكلي)
    let SSTO = 0;
    allValues.forEach(value => {
        SSTO += Math.pow(value - overallAvg, 2);
    });

    // حساب SSE (التباين داخل المجموعات)
    const SSE = SSTO - SSTR;

    const dfBetween = 5- 1;
    const dfWithin = totalObservations -5 ;
    const dfTotal = totalObservations - 1;

    
    // حساب MSTR و MSE
    const k = groupAvgs.length;
    const MSTR = SSTR / (k - 1);
    const MSE = SSE / (totalObservations - k);

   
    // حساب F-ratio
    const FRatio = MSTR / MSE;

    // عرض النتائج
    document.getElementById("SSTR").textContent = SSTR.toFixed(2);
    document.getElementById("SSE").textContent = SSE.toFixed(2);
    document.getElementById("SSTO").textContent = SSTO.toFixed(2);
    document.getElementById("MSTR").textContent = MSTR.toFixed(2);
    document.getElementById("MSE").textContent = MSE.toFixed(2);
    document.getElementById("dfBetween").textContent = dfBetween;
    document.getElementById("dfWithin").textContent = dfWithin;
    document.getElementById("dfTotal").textContent = dfTotal;
    document.getElementById("FRatio").textContent = FRatio.toFixed(2);
}

document.querySelectorAll("input[type='number']").forEach(input => {
    input.addEventListener("input", calculateANOVA);
});

// حساب القيم عند تحميل الصفحة
calculateANOVA();
