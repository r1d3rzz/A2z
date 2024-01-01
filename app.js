const btn = document.getElementById("btn");
let isError = false;

btn.addEventListener("click", function () {
  let num1 = document.getElementById("num1").value;
  let num2 = document.getElementById("num2").value;
  let operator = document.getElementById("operator").value;
  let res = null;

  if (!validate(num1, num2)) {
    [num1, num2] = changeInt([num1, num2]);

    switch (operator) {
      case "+":
        res = num1 + num2;
        break;
      case "-":
        res = num1 - num2;
        break;
      case "*":
        res = num1 * num2;
        break;
      case "/":
        res = num1 / num2;
        break;
      default:
        res = 0;
        break;
    }
  }

  if (res) {
    document.getElementById("result").innerText = res;
  } else {
    document.getElementById("result").innerText = 0;
  }
});

function changeInt(strVals = []) {
  return strVals.map((strVal) => parseInt(strVal));
}

function validate(num1, num2) {
  if (num1 == "" || num1 == undefined || num1 == null) {
    document.getElementById("num1Error").textContent = "Num1 is required";
    isError = true;
  } else {
    document.getElementById("num1Error").textContent = null;
  }

  if (num2 == "" || num2 == undefined || num2 == null) {
    document.getElementById("num2Error").textContent = "Num2 is required";
    isError = true;
  } else {
    document.getElementById("num2Error").textContent = null;
  }

  if (isError) false;

  return (isError = false);
}
