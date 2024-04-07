<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Manage Produk') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
            <x-toast type="success" :message="session('success')" />
            @elseif(session('errors'))
            <x-toast type="error" :message="session('errors')" />
            @endif

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                <table id="manageProduk" class="display" style="width:100%">
                    <button data-modal-target="createModal" data-modal-toggle="createModal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 float-right">Buat produk</button>
                    @include('manageProduk.create')
                    
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Gambar</th>
                            <th>Deskripsi</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($produks as $produk)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$produk -> kode}}</td>
                            <td>{{$produk -> nama}}</td>
                            <td>
                                <img class="rounded-t-lg w-32 h-auto object-center" src="{{asset('img/logo2.png')}}" alt="">
                            </td>
                            <td>{{$produk -> deskripsi}}</td>
                            <td>
                                <button data-modal-target="viewModal{{$produk -> id}}" data-modal-toggle="viewModal{{$produk -> id}}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">View</button>  
                                <button type="button" data-modal-target="editModal{{$produk -> id}}" data-modal-toggle="editModal{{$produk -> id}}" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">Ubah</button>
                                @include('manageProduk.edit')

                                <button type="button" data-modal-target="deleteModal{{$produk -> id}}" data-modal-toggle="deleteModal{{$produk -> id}}" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Hapus</button>
                                @include('manageProduk.delete')
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Gambar</th>
                            <th>Deskripsi</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>