@extends('entries.master')
@section('entries')
<div class="container mx-auto bg-white shadow-md rounded-lg p-4">
<form action="{{ route('entries.store') }}" method="POST">
@csrf
<div class="grid grid-cols-4 gap-4 mb-4">
<div class="mb-4">
<label for="date" class="block text-gray-700">التاريخ</label>
<input type="date" name="date" id="date" class="border border-gray-300 rounded px-2 py-1 w-full"
required>
</div>
<div class="col-span-1">
<label for="entry-number" class="block text-gray-700">رقم القيد</label>
<input type="text" name="entry_number" id="entry_number"
class="border border-gray-300 rounded px-2 py-1 w-full" required>
</div>
<div class="col-span-1">
<label for="entry-type" class="block text-gray-700">الحساب الاول</label>
<select name="entries[0][chart_of_account_id]" id="entry-type"
class="border border-gray-300 rounded py-2 px-4 w-full" onchange="updateAccountDetails(this)">
<option>إختر الحساب</option>
@foreach ($accounts as $account)
<option value="{{ $account->id }}" data-name="{{ $account->account_name }}"
data-number="{{ $account->account_number }}">{{ $account->account_name }}</option>
@endforeach
</select>
</div>
<div class="col-span-1">
<label for="entry-type" class="block text-gray-700">الحساب الثاني</label>
<select name="entries[1][chart_of_account_id]" id="entry-type"
class="border border-gray-300 rounded py-2 px-4" onchange="upAccountDetails(this)">
<option>إختر الحساب</option>
@foreach ($accounts as $account)
<option value="{{ $account->id }}" data-name="{{ $account->account_name }}"
data-number="{{ $account->account_number }}">{{ $account->account_name }}</option>
@endforeach
</select>
</div>
<div class="col-span-1">
<label for="entry-status" class="block text-gray-700">حالة القيد</label>
<select name="entry_status" id="entry-status" class="border border-gray-300 rounded py-2 px-4 w-full">
<option>قيد المراجعة</option>
</select>
</div>
</div>
<table class="w-full border-collapse">
<thead>
<tr class="bg-green-700 text-white">
<th class="border border-gray-300 py-2 px-4">الإجراء</th>
<th class="border border-gray-300 py-2 px-4">المرجع</th>
<th class="border border-gray-300 py-2 px-4">مركز التكلفة</th>
<th class="border border-gray-300 py-2 px-4">إسم الحساب</th>
<th class="border border-gray-300 py-2 px-4">رقم الحساب</th>
<th class="border border-gray-300 py-2 px-4">دائن</th>
<th class="border border-gray-300 py-2 px-4">مدين</th>
</tr>
</thead>
<tbody id="table-body">
<tr>
<td class="border border-gray-300 py-2 px-4 text-center" rowspan="100">
<button class="bg-blue-500 text-white rounded-full p-2" onclick="addRow()">
<i class="fas fa-plus"></i>
</button>
</td>
<td>
<input type="text" name="entries[0][reference]" id="reference"
class="border border-gray-300 rounded px-2 py-3 w-full" required>
</td>
<td>
<input type="text" name="entries[0][cost_center]" id="cost_center"
class="border border-gray-300 rounded px-2 py-3 w-full" required>
</td>
<td>
<input type="text" name="entries[0][account_name]" id="account_name"
class="border border-gray-300 rounded px-2 py-3 w-full" required>
</td>
<td>
<input type="text" name="entries[0][account_number]" id="account_number"
class="border border-gray-300 rounded px-2 py-3 w-full" required>
</td>
<td class="border border-gray-300 py-2 px-4 bg-red-100">
<input type="number" name="entries[0][credit]" id="credit" value=0.00
class="border border-gray-300 rounded py-2 px-4 w-full credit-input"
oninput="calculateDifference()">
</td>
<td class="border border-gray-300 py-2 px-4">
<input type="number" name="entries[0][debit]" id="debit" value=0.00
class="border border-gray-300 rounded px-2 py-3 w-full debit-input"
oninput="calculateDifference()" required>
</td>
</tr>
<tr>
<td>
<input type="text" name="entries[1][reference]" id="reference2"
class="border border-gray-300 rounded px-2 py-3 w-full" required>
</td>
<td>
<input type="text" name="entries[1][cost_center]" id="cost_center2"
class="border border-gray-300 rounded px-2 py-3 w-full" required>
</td>
<td>
<input type="text" name="entries[1][account_name]" id="account_name2"
class="border border-gray-300 rounded px-2 py-3 w-full" required>
</td>
<td>
<input type="text" name="entries[1][account_number]" id="account_number2"
class="border border-gray-300 rounded px-2 py-3 w-full" required>
</td>
<td class="border border-gray-300 py-2 px-4 bg-red-100">
<input type="number" name="entries[1][credit]" id="credit" value=0.00
class="border border-gray-300 rounded py-2 px-4 w-full credit-input"
oninput="calculateDifference()">
</td>
<td class="border border-gray-300 py-2 px-4">
<input type="number" name="entries[1][debit]" id="debit" value=0.00
class="border border-gray-300 rounded px-2 py-3 w-full debit-input"
oninput="calculateDifference()" required>
</td>
</tr>

<tr class="bg-green-100">
<td class="border border-gray-300 py-2 px-4 text-center" colspan="4">الإجمالي</td>
<td class="border border-gray-300 py-2 px-4 text-center" id="credit-total">0.00</td>
<td class="border border-gray-300 py-2 px-4 text-center" id="debit-total">0.00</td>
</tr>
<tr>
<td class="border border-gray-300 py-2 px-4 text-center" colspan="5">الفرق بين الجانبين</td>
<td class="border border-gray-300 py-2 px-4 text-center"><input id="difference" readonly
type="number" class="border border-gray-300 py-2 px-4 text-center" name="totel"
required></td>
</tr>
</tbody>
</table>
<div class="flex justify-between items-center mt-4">
<div class="flex space-x-2">
<button class="bg-blue-500 text-white py-2 px-4 rounded flex items-center">
<i class="fas fa-search ml-2"></i> البحث
</button>
<button class="bg-gray-700 text-white py-2 px-4 rounded flex items-center">
<i class="fas fa-paperclip ml-2"></i> اضافة مرفق
</button>
<button class="bg-purple-500 text-white py-2 px-4 rounded flex items-center">
<i class="fas fa-print ml-2"></i> طباعة
</button>
</div>
<div class="flex space-x-2">
<button class="bg-red-500 text-white py-2 px-4 rounded flex items-center">
<i class="fas fa-trash ml-2"></i> حذف
</button>
<button type="submit" class="bg-green-700 text-white py-2 px-4 rounded flex items-center">
<i class="fas fa-save ml-2"></i> حفظ
</button>
</div>
</div>
</form>
</div>
<script>
function updateAccountDetails(selectElement) {
const selectedAccount = selectElement.options[selectElement.selectedIndex];
const accountNameInput = document.getElementById('account_name');
const accountNumberInput = document.getElementById('account_number');


accountNameInput.value = selectedAccount.getAttribute('data-name');
accountNumberInput.value = selectedAccount.getAttribute('data-number');


}

function upAccountDetails(selectElement) {
const selectedAccount = selectElement.options[selectElement.selectedIndex];

const accountNameInput2 = document.getElementById('account_name2');
const accountNumberInput2 = document.getElementById('account_number2');


accountNameInput2.value = selectedAccount.getAttribute('data-name');
accountNumberInput2.value = selectedAccount.getAttribute('data-number');
}
</script>
@endsection
