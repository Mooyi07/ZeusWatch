function updateElements(className, value) {
  document.querySelectorAll(`.${className}`).forEach(el => el.innerHTML = value.toFixed(2));
}

function updateElement(id, value) {
  let el = document.getElementById(id);
  if (el) el.innerHTML = value.toFixed(2);
}

function formulaVal(value) {
  const charges = {
      distCharge: 0.2748, suppCharge: 0.4140, meterCharge: 0.3460, rfsc: 0.1518,
      genCharge: 7.3141, transCharge: 1.3272, sysLossCharge: 0.9543, lrc: 0.0006,
      vatGen: 0.5129, vatTransRate: 0.1200, vatSystLoss: 0.0765, npcStrandDebts: 0.0428,
      missionaryElect: 0.1805, enviroCharge: 0.0017, fitAllow: 0.0838
  };

  updateElements("basePrice", 0);
  if (!value) return;

  updateElement("distCharge", charges.distCharge * value);
  updateElement("suppCharge", charges.suppCharge * value);
  updateElement("meterCharge", charges.meterCharge * value);
  updateElement("rfsc", charges.rfsc * value);
  
  let nepcrc = (charges.distCharge + charges.suppCharge + charges.meterCharge + charges.rfsc) * value + 5;
  updateElement("npc", nepcrc);
  
  updateElement("genCharge", charges.genCharge * value);
  updateElement("transCharge", charges.transCharge * value);
  updateElement("sysLossCharge", charges.sysLossCharge * value);
  
  let suppRC = (charges.genCharge + charges.transCharge + charges.sysLossCharge) * value;
  updateElement("src", suppRC);
  
  updateElement("lrc", charges.lrc * value);
  updateElement("seniorCitSub", 0.05);
  let subsidies = (charges.lrc * value) + 0.05;
  updateElement("subsidies", subsidies);
  
  updateElement("vatGen", charges.vatGen * value);
  updateElement("vatOnTrans", charges.transCharge * value);
  updateElement("vatTrans", charges.vatTransRate * charges.transCharge * value);
  updateElement("vatSystLoss", charges.vatSystLoss * value);
  updateElement("vatDSM", nepcrc + subsidies);
  updateElement("vatOtherCharge", charges.vatTransRate * (nepcrc + subsidies));
  updateElement("npcStrandDebts", charges.npcStrandDebts * value);
  updateElement("missionaryElect", charges.missionaryElect * value);
  updateElement("enviroCharge", charges.enviroCharge * value);
  updateElement("fitAllow", charges.fitAllow * value);
  
  let totalBill = nepcrc + subsidies + suppRC + (charges.vatGen * value) + (charges.vatTransRate * charges.transCharge * value) + (charges.vatSystLoss * value) + (charges.vatTransRate * (nepcrc + subsidies)) + (charges.npcStrandDebts * value) + (charges.missionaryElect * value) + (charges.enviroCharge * value) + (charges.fitAllow * value);
  updateElement("totalBill", totalBill);
}

function showHint(str) {
  formulaVal(str.length ? parseFloat(str) : 0);
}

formulaVal(0);