<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accounting Entry</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script>
        function calculateDifference() {
            let debitTotal = 0;
            let creditTotal = 0;

            document.querySelectorAll('.debit-input').forEach(input => {
                debitTotal += parseFloat(input.value) || 0;
            });

            document.querySelectorAll('.credit-input').forEach(input => {
                creditTotal += parseFloat(input.value) || 0;
            });

            document.getElementById('debit-total').innerText = debitTotal.toFixed(2);
            document.getElementById('credit-total').innerText = creditTotal.toFixed(2);
            document.getElementById('difference').value= (debitTotal - creditTotal).toFixed(2);
        }

        function addRow() {
            const tableBody = document.getElementById('table-body');
            const newRow = document.createElement('tr');

            newRow.innerHTML = `

                <td class="border border-gray-300 py-2 px-4">
                    <input type="text" class="border border-gray-300 rounded py-2 px-4 w-full">
                </td>
                <td class="border border-gray-300 py-2 px-4">
                    <input type="text" class="border border-gray-300 rounded py-2 px-4 w-full">
                </td>
                <td class="border border-gray-300 py-2 px-4">
                    <input type="text" class="border border-gray-300 rounded py-2 px-4 w-full">
                </td>
                <td class="border border-gray-300 py-2 px-4">
                    <input type="text" class="border border-gray-300 rounded py-2 px-4 w-full">
                </td>
                <td class="border border-gray-300 py-2 px-4 bg-red-100">
                    <input type="text" class="border border-gray-300 rounded py-2 px-4 w-full credit-input" oninput="calculateDifference()">
                </td>
                <td class="border border-gray-300 py-2 px-4">
                    <input type="text" class="border border-gray-300 rounded py-2 px-4 w-full debit-input" oninput="calculateDifference()">
                </td>
            `;

            tableBody.insertBefore(newRow, tableBody.lastElementChild.previousElementSibling);
        }
    </script>
</head>

<body class="bg-gray-100 p-4">
    <div class="container mx-auto bg-white shadow-md rounded-lg p-4">
        <div class="flex justify-between items-center mb-4">
            <a href="{{ route('entries.create') }}" class="bg-green-700 text-white py-2 px-4 rounded">اضافة قيد
                محاسبي</a>
            <div class="flex space-x-2">
                <a href="{{ route('entries.index') }}" class="bg-yellow-500 text-white py-2 px-4 rounded">قيود قيد
                    المراجعة</a>
                <a href="{{ route('entries.index') }}" class="bg-yellow-500 text-white py-2 px-4 rounded">قيود تمت
                    المراجعة</a>
                <a href="{{ route('entries.index') }}" class="bg-yellow-500 text-white py-2 px-4 rounded">قيود تم
                    التامين</a>
            </div>
        </div>
        @yield('entries')
    </div>
</body>

</html>
