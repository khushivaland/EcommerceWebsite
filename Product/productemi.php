<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loan EMI Calculator</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script>
        function calculate() {
            debugger
            const loanAmount = document.getElementById("amount");
            const loanTenure = document.getElementById("tenure");
            const loanRate = document.getElementById("interest");

            const loanEmi = document.querySelector(".emi");
            const loanPrinciple = document.querySelector(".principle");
            const loanTotal = document.querySelector(".total");
            const loanInterest = document.querySelector(".interest_rate");

            amount = loanAmount.value;
            tenure = (loanTenure.value) * 12;
            rate = (loanRate.value) / 12 / 100;

            emi = ((amount * rate * (1 + rate) ** tenure) / (((1 + rate) ** tenure) - 1));
            //console.log(emi);

            total = emi * tenure;
            interest = total - amount

            loanEmi.innerHTML = emi;
            loanPrinciple.innerHTML = amount;
            loanTotal.innerHTML = total;
            loanInterest.innerHTML = interest;

        }
    </script>
</head>

<body>
    <div class="wrapper">
        <h2>Personal Loan EMI Calculator</h2>
        <span class="div-bar"></span>
        <div class="calculator">
            <div>
                <label for="">Loan Amount (Rs.):</label>
                <input type="number" id="amount">
            </div>
            <div>
                <label for="">Interest Rate (%):</label>
                <input type="number" id="interest">
            </div>
            <div>
                <label for="">Loan Tenure (Year.):</label>
                <input type="number" id="tenure">
            </div>

            <div>
                <button class="calculator-btn" onclick="calculate()">Calculate EMI</button>
            </div>
        </div>

        <div class="calculator-result">
            <ul>
                <li>Monthly Loan EMI: <span class="emi"></span></li>
                <li>Principle Amount: <span class="principle"></span></li>
                <li>Loan on Interest: <span class="interest_rate"></span></li>
                <li>Total Amount to be paid: <span class="total"></span></li>
            </ul>
        </div>
    </div>
</body>

</html>