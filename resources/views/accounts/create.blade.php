<html lang="ar" dir="rtl"> >

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>اضافه حساب</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    </link>
</head>

<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-6 text-center text-gray-800">اضافه حساب</h1>
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="p-6">
                <form action="{{ route('accounts.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="account_name" class="block text-gray-700 text-sm font-bold mb-2">اسم الحساب
                        </label>
                        <input type="text" name="account_name" id="account_name"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            placeholder="Enter Account Name" required>
                    </div>
                    <div class="mb-4">
                        <label for="account_number" class="block text-gray-700 text-sm font-bold mb-2">رقم الحساب
                        </label>
                        <input type="text" name="account_number" id="account_number"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            placeholder="Enter Account Number" required>
                    </div>
                    <div class="mb-4">
                        <label for="parent_id" class="block text-gray-700 text-sm font-bold mb-2">الحساب الرئيسي</label>
                        <input type="text" name="parent_id" id="parent_id"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <div class="flex items-center justify-between">
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Save
                            Account</button>
                        <a href="{{ route('accounts.index') }}"
                            class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
