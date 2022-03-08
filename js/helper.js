// KIMPER BAHAN MONITORING
function differenceOfDays(start, end) {
    const date1 = new Date(start);
    const date2 = new Date(end);

    // One day in milliseconds
    const oneDay = 1000 * 60 * 60 * 24;

    // Calculating the time difference between two dates
    const diffInTime = date2.getTime() - date1.getTime();

    // Calculating the no. of days between two dates
    const diffInDays = Math.round(diffInTime / oneDay);

    return diffInDays;
}

// KIMPER BAHAN OTHER
function validasiMuatDataMonitoringKimperBahanLain() {
    var x = document.forms["formPilihPeriode"]["tahun"].value;
    var y = document.forms["formPilihPeriode"]["bulan"].value;

    if (x == "" || y == "") {
      alert("Pilih atau isikan tahun dan bulan terlebih dahulu.");
      return false;
    }
  }