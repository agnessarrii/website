<div class="table-responsive">
    <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
        <thead>
            <tr class="fw-bolder text-muted">
                <th class="max-w-150px">No</th>
                <th class="max-w-150px">Pemesan</th>
                <th class="max-w-150px">Rental</th>
                <th class="max-w-130px">Price</th>
                <th class="max-w-130px">Status</th>
                <th class="max-w-100px"> </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($collection as $i => $item)
            <tr>
                <td>
                    {{$i+1}}
                </td>
                <td>
                    <span class="fw-bolder text-dark">{{ $item->name }}</span>
                </td>
                <td class="text pe-0">
                    <span class="fw-bolder text-dark"> </span>
                </td>
                <td class="text pe-0">
                    <span class="fw-bolder text-dark">{{ $item->description }}</span>
                </td>
                <td class="text pe-0">
                    <span class="fw-bolder text-dark">{{ $item->price }}</span>
                </td>
                <td class="text pe-0">
                    <span class="fw-bolder text-dark">{{ $item->status }}</span>
                </td>
                <td class="pe-0">
                    <div class="menu-item px-3">
                        <a href="javascript:;" onclick="handle_delete('{{route('orders.destroy',$item->id)}}');" class="menu-link px-3">Hapus</a>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
{{ $collection->links('theme.web.pagination') }}