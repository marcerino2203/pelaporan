$('#add').on('click', function(){
    console.log('add row');
    add_row();
})
function add_row(){
    var table = document.getElementById("stok");
    var index=table.rows.length-1;
    // var rowCount = $('#myTable tr').length;
    var row = table.insertRow(table.rows.length);
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);
    cell1.innerHTML = document.getElementById('bahan_col').innerHTML;
    cell2.innerHTML = document.getElementById('jumlah_col').innerHTML;
    cell3.innerHTML = 'Gr';
}
// $('#select_bahan').on('change', function(){
//     console.log('ganti cuy');
//     $data=[];
//     // var table = document.getElementById(tableID);
//     $('.satuan').replaceWith("Kg");
//     console.log($(this).val());
//     $data["satuan"]=$(this).val();

//     $.ajax({
//         type: "POST",
//         url: "resep_controler/get_satuan",
//         // data: form.serialize(), 
//         data: $('#form_resep').serialize(),
//         cache	: false,// serializes the form's elements.
//         success: function(data)
//         {
//             // alert(data); // show response from the php script.
//         }
//       });
// })

// function tambah()
// {
//     console.log('masuk ke fungsi tambah');
//     // untuk ambil nilai pada input
//     // var nama = document.getElementById('nama').value;
//     // var paket = document.getElementById('paket').value;
//     // var lama = document.getElementById('lama').value;
    
    
//     // 0 = baris awal pada tabel
//     var table = document.getElementsByTagName('table')[0];
    
//     // tambah baris kosong pada tabel
//     // 0 = dihitung dari atas 
//     // table.rows.length = menambahkan pada akhir baris
//     // table.rows.length/2 = menambahkan data pada baris tengah tabel , urutan baris ke 2 
//     var newRow = table.insertRow(table.rows.length/2);
    
//     // tambah cell pada baris baru
//     var cell1 = newRow.insertCell(0);
    // var cell2 = newRow.insertCell(1);
    // var cell3 = newRow.insertCell(2);
    
    // tambah nilai ke dalam cell
    // cell1.innerHTML = nama;
    // cell2.innerHTML = paket;
    // cell3.innerHTML = lama;
// }