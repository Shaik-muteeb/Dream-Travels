// function showTab(tabName) {
//     alert(tabName);
// //     const bus=document.getElementById(`seat-map`)
// //     var busNumber = this.getAttribute('data-busnumber');
// //     console.log(busNumber);
// // document.querySelector(`#tab-${busNumber}`).forEach(tab => {
// // tab.classList.remove('active');
// // });
// // document.querySelector(`#boarding-${busNumber}`).forEach(content => {
// // content.classList.remove('active');
// // });
// // document.querySelector(`#dropping-${busNumber}`).forEach(content => {
// // content.classList.remove('active');
// // });
// // document.querySelector(`[onclick="showTab('${tabName}')"]`).classList.add('active');
// // document.getElementById(tabName).classList.add('active');

// }

function proceedToBook() {
    document.getElementById('selectionScreen').style.display = 'none';
    document.getElementById('confirmationScreen').style.display = 'block';
}

function goBackToSelection() {
    document.getElementById('selectionScreen').style.display = 'block';
    document.getElementById('confirmationScreen').style.display = 'none';
}
