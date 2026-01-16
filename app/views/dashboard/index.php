<?php ?>
  <main class="flex-1 p-8">

    <!-- Header -->
    <div class="flex justify-between items-center mb-8">
      <h1 class="text-2xl font-bold text-gray-800">
        Dashboard
      </h1>
      <span class="text-sm text-gray-600">
        Welcome back 👋
      </span>
    </div>

    <!-- Stats -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
      
      <div class="bg-white p-6 rounded-xl shadow">
        <p class="text-sm text-gray-500">Total Balance</p>
        <h2 class="text-2xl font-bold text-indigo-600 mt-2">
          $2,450
        </h2>
      </div>

      <div class="bg-white p-6 rounded-xl shadow">
        <p class="text-sm text-gray-500">Total Incomes</p>
        <h2 class="text-2xl font-bold text-green-600 mt-2">
          $4,000
        </h2>
      </div>

      <div class="bg-white p-6 rounded-xl shadow">
        <p class="text-sm text-gray-500">Total Expenses</p>
        <h2 class="text-2xl font-bold text-red-600 mt-2">
          $1,550
        </h2>
      </div>

    </div>

    <!-- Recent Activity -->
    <div class="bg-white rounded-xl shadow p-6">
      <h2 class="text-lg font-semibold text-gray-800 mb-4">
        Recent Transactions
      </h2>

      <table class="w-full text-sm text-left">
        <thead class="text-gray-500 border-b">
          <tr>
            <th class="py-2">Type</th>
            <th class="py-2">Category</th>
            <th class="py-2">Amount</th>
            <th class="py-2">Date</th>
          </tr>
        </thead>
        <tbody class="text-gray-700">
          <tr class="border-b">
            <td class="py-2 text-green-600">Income</td>
            <td>Salary</td>
            <td>$2,000</td>
            <td>2026-01-15</td>
          </tr>
          <tr class="border-b">
            <td class="py-2 text-red-600">Expense</td>
            <td>Food</td>
            <td>$150</td>
            <td>2026-01-14</td>
          </tr>
          <tr>
            <td class="py-2 text-red-600">Expense</td>
            <td>Transport</td>
            <td>$80</td>
            <td>2026-01-13</td>
          </tr>
        </tbody>
      </table>
    </div>

  </main>
<?php ?>