<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Transaction Detail</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap');

    body {
      font-family: 'Roboto', sans-serif;
      margin: 2.5cm 2cm;
      background: #fff;
      color: #222;
    }

    h1 {
      text-align: center;
      font-weight: 700;
      font-size: 2rem;
      color: #1a2637;
      margin-bottom: 2rem;
      letter-spacing: 1.5px;
      text-transform: uppercase;
    }

    .table-responsive {
      overflow-x: auto;
      -webkit-overflow-scrolling: touch;
      max-width: 800px;
      margin: 0 auto;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      font-size: 0.95rem;
      color: #1a2637;
      min-width: 600px;
    }

    thead tr {
      background-color: #1a2637;
      color: #f0f3f7;
    }

    thead th {
      padding: 12px 15px;
      font-weight: 700;
      border: 1px solid #415a77;
      text-align: left;
      user-select: none;
      white-space: nowrap;
    }

    tbody tr:nth-child(even) {
      background-color: #f8faff;
    }

    tbody tr:hover {
      background-color: #d6e4ff;
    }

    tbody td {
      padding: 10px 15px;
      border: 1px solid #c5d1e3;
      vertical-align: middle;
      white-space: nowrap;
    }

    tbody td.amount {
      text-align: right;
      font-weight: 700;
      color: #234e70;
    }

    tbody td.expense {
      text-align: center;
      font-weight: 700;
      color: green;
    }

    tbody td.expense.no {
      color:red;
    }
    .footer-note {
    margin-top: 2rem;
    font-size: 0.85rem;
    color: #444;
    font-style: italic;
    text-align: right;
    user-select: none;
  }

    @media print {
      body {
        margin: 1.5cm 1cm;
        color: #000;
        background: #fff;
      }
      table {
        border-collapse: collapse;
        border: 1px solid #000;
      }
      thead tr {
        background-color: #000 !important;
        color: #fff !important;
      }
      thead th, tbody td {
        border: 1px solid #000 !important;
        color: #000 !important;
      }
      tbody tr:nth-child(even) {
        background-color: #fff !important;
      }
      tbody tr:hover {
        background-color: transparent !important;
      }
      tbody td.expense {
        color: green !important;
      }
      tbody td.expense.no {
        color: red!important;
      }
    }

    @media (max-width: 768px) {
      body {
        margin: 1.5cm 1cm;
      }
      h1 {
        font-size: 1.6rem;
        margin-bottom: 1.2rem;
      }
      table {
        font-size: 0.85rem;
        min-width: 500px;
      }
      thead th, tbody td {
        padding: 8px 10px;
      }
    }

    @media (max-width: 480px) {
      table {
        font-size: 0.8rem;
        min-width: 400px;
      }
      thead th, tbody td {
        padding: 6px 8px;
      }
      h1 {
        font-size: 1.4rem;
      }
    }
  </style>
</head>
<body>
  <h1>Transaction Reports</h1>
  <div class="table-responsive">
    <table>
      <thead>
        <tr>
          <th>Field</th>
          <th>Value</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>ID</td>
          <td>1</td>
        </tr>
        <tr>
          <td>Date</td>
          <td>{{ \Carbon\Carbon::parse($record->date)->format('d M Y') }}</td>
        </tr>
        <tr>
          <td>Name</td>
          <td>{{ $record->category->name ?? '-' }}</td>
        </tr>
        <tr>
          <td>Description</td>
          <td>{{ $record->note }}</td>
        </tr>
        <tr>
          <td>Amount</td>
          <td class="amount">Rp {{ number_format($record->amount, 2, ',', '.') }}</td>
        </tr>
        <tr>
          <td>Type</td>
          <td class="expense {{ !empty($record->category) && $record->category->is_expense ? '' : 'no' }}">
            {{ !empty($record->category) && $record->category->is_expense ? 'Income' : 'Expense' }}
          </td>
        </tr>
      </tbody>
    </table>
  </div>
  <div class="footer-note">
    * All transactions recorded based on original proofs and verified for accuracy.
  </div>
  <script>
    window.onload = function () {
      window.print();
    };

    
  </script>
  
</body>
</html>
