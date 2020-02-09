<div class='col-md-12'>
    <div class='box box-info'>
        <div class='box-header with-border'>
            <h3 class='box-title'>Detail Survey</h3>
        </div>
    <div class='box-body'>
    <div id="app">
        <div class="col-md-12 table-responsive">
            <table class="table bg-dark my-3">
                <tr>
                    <td width='150px'><input placeholder="Cari Data"type="search" class="form-control" v-model="search.text" @keyup="caribiodata" name="search"></td>
                </tr>
            </table>
            <table class='table table-hover table-condensed'>
                <thead>
                    
                    <th class="text-white">ID</th>
                    <th class="text-white">Nama</th>
                    <th class="text-white">Alamat</th>
                    <th class="text-white">No HP</th>
                    <th class="text-white">Pilihan Ke 1</th>
                    <th class="text-white">Pilihan Ke 2</th>
                    <th class="text-white">Pilihan Ke 3</th>
                    <th class="text-white">Pilihan Ke 4</th>
                    <th class="text-white">Pilihan Ke 5</th>
                    <th class="text-white">Pilihan Ke 6</th>
                    <th class="text-white">Pilihan Ke 7</th>
                    <th class="text-white">Pilihan Ke 8</th>
                
                    <th colspan="2" class="text-center text-white">Action</th>
                    </thead>
                    <tbody>
                        <tr v-for="crud in biodata">
                            <td>{{crud.id_survey}}</td>
                            <td>{{crud.nama}}</td>
                            <td>{{crud.email}}</td>
                            <td>{{crud.no_hp}}</td>
                            <td>{{crud.a}}</td>
                            <td>{{crud.b}}</td>
                            <td>{{crud.c}}</td>
                            <td>{{crud.d}}</td>
                            <td>{{crud.e}}</td>
                            <td>{{crud.f}}</td>
                            <td>{{crud.g}}</td>
                            <td>{{crud.h}}</td>
                        
                            <td><button class="btn btn-info fa fa-edit" @click="editModal = true; selectbiodata(crud)"></button></td>
                            <td><button class="btn btn-danger fa fa-trash" @click="deleteModal = true; selectbiodata(crud)"></button></td>
                        </tr>

                        <tr v-if="emptyResult">
                        <td colspan="9" rowspan="4" class="text-center h3">Tidak ada data ditemukan</td>
                    </tr>
                    </tbody>
                    
                </table>
                
            </div>
    
        </div>
        <pagination
            :current_page="currentPage"
            :row_count_page="rowCountPage"
            @page-update="pageUpdate"
            :total_biodata="totalbiodata"
            :page_range="pageRange"
            >
        </pagination>
    </div>
</div>
