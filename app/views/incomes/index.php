<?php ?>
<main class="flex-1 p-8">

  <!-- Header -->
  <div class="flex justify-between items-center mb-8">
    <h1 class="text-2xl font-bold text-gray-800">
      Incomes
    </h1>

    <button
      class="bg-indigo-600 hover:bg-indigo-700
             text-white px-4 py-2 rounded-lg
             font-medium transition"
    >
      + Add Income
    </button>
  </div>

  <!-- Summary Cards -->
  <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">

    <div class="bg-white p-6 rounded-xl shadow">
      <p class="text-sm text-gray-500">Total Incomes</p>
      <h2 class="text-2xl font-bold text-green-600 mt-2">
        $4,000
      </h2>
    </div>

    <div class="bg-white p-6 rounded-xl shadow">
      <p class="text-sm text-gray-500">This Month</p>
      <h2 class="text-2xl font-bold text-indigo-600 mt-2">
        $1,200
      </h2>
    </div>

    <div class="bg-white p-6 rounded-xl shadow">
      <p class="text-sm text-gray-500">Last Income</p>
      <h2 class="text-xl font-semibold text-gray-700 mt-2">
        Salary – $2,000
      </h2>
    </div>

  </div>

  <!-- Incomes Table -->
  <div class="bg-white rounded-xl shadow p-6">

    <h2 class="text-lg font-semibold text-gray-800 mb-4">
      Income History
    </h2>

    <table class="w-full text-sm text-left">
      <thead class="text-gray-500 border-b">
        <tr>
          <th class="py-2">Source</th>
          <th class="py-2">Category</th>
          <th class="py-2">Amount</th>
          <th class="py-2">Date</th>
          <th class="py-2 text-right">Actions</th>
        </tr>
      </thead>

      <tbody class="text-gray-700">
        <tr class="border-b">
          <td class="py-2">Salary</td>
          <td>Job</td>
          <td class="text-green-600 font-medium">$2,000</td>
          <td>2026-01-15</td>
          <td class="text-right space-x-2">
            <button class="text-indigo-600 hover:underline">
              Edit
            </button>
            <button class="text-red-600 hover:underline">
              Delete
            </button>
          </td>
        </tr>

        <tr class="border-b">
          <td class="py-2">Freelance</td>
          <td>Side Hustle</td>
          <td class="text-green-600 font-medium">$500</td>
          <td>2026-01-10</td>
          <td class="text-right space-x-2">
            <button class="text-indigo-600 hover:underline">
              Edit
            </button>
            <button class="text-red-600 hover:underline">
              Delete
            </button>
          </td>
        </tr>

        <tr>
          <td class="py-2">Gift</td>
          <td>Other</td>
          <td class="text-green-600 font-medium">$300</td>
          <td>2026-01-05</td>
          <td class="text-right space-x-2">
            <button class="text-indigo-600 hover:underline">
              Edit
            </button>
            <button class="text-red-600 hover:underline">
              Delete
            </button>
          </td>
        </tr>
      </tbody>
    </table>

  </div>

</main>
<?php ?>