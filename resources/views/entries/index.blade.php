@extends('entries.master')
@section('entries')
    <table>
        <thead>
            <tr class="bg-green-800 text-white">
                <th class="border border-gray-300 px-4 py-2">إجراء</th>
                <th class="border border-gray-300 px-4 py-2">تاريخ</th>
                <th class="border border-gray-300 px-4 py-2">رقم القيد</th>
                <th class="border border-gray-300 px-4 py-2">اسم الحساب</th>
                <th class="border border-gray-300 px-4 py-2">رقم الحساب</th>
                <th class="border border-gray-300 px-4 py-2">مركز التكلفة</th>
                <th class="border border-gray-300 px-4 py-2">المرجع</th>
                <th class="border border-gray-300 px-4 py-2">مدين</th>
                <th class="border border-gray-300 px-4 py-2">دائن</th>
            </tr>
        </thead>
        @foreach ($entries as $entry)
            <tbody>
                <tr>
                    <td class="border border-gray-300 px-4 py-2 text-center">
                        <a href="{{ route('entries.edit', $entry->id) }}" class="text-blue-500"><i
                                class="fas fa-edit"></i></a>
                        <form action="{{ route('entries.destroy', $entry->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                    <td class="border border-gray-300 px-4 py-2">{{ $entry->date }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $entry->entry_number }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $entry->account_name }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $entry->account_number }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $entry->cost_center }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $entry->reference }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $entry->debit }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $entry->credit }}</td>
                </tr>
            </tbody>
        @endforeach
    </table>
@endsection
