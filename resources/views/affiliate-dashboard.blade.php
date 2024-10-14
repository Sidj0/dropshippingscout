<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Affiliate Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .section {
            margin-bottom: 30px;
            background: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .section h2 {
            margin: 0 0 15px;
            font-size: 24px;
        }

        .cards {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .card {
            flex: 1;
            min-width: 200px;
            background: #f9f9f9;
            border-radius: 8px;
            padding: 20px;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .card h3 {
            margin: 0 0 10px;
            font-size: 18px;
        }

        .card p {
            font-size: 24px;
            margin: 0;
        }

        .chart {
            height: 200px;
            background: #ececec;
            border-radius: 8px;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #777;
        }

        .marketing-cards {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .marketing-card {
            flex: 1 1 calc(25% - 20px);
            min-width: 200px;
            background: #f9f9f9;
            border-radius: 8px;
            padding: 15px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .marketing-card img {
            max-width: 40px;
            margin-bottom: 10px;
        }

        .marketing-card h4 {
            margin: 10px 0;
            font-size: 16px;
        }

        .marketing-card p {
            font-size: 14px;
            color: #666;
        }

        @media (max-width: 768px) {
            .cards, .marketing-cards {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Earnings Section -->
        <div class="section">
            <h2>Total Earnings</h2>
            <div class="cards">
                <div class="card">
                    <h3>Cleared Balance</h3>
                    <p>$0</p>
                </div>
                <div class="card">
                    <h3>Pending Balance</h3>
                    <p>$0</p>
                </div>
                <div class="card">
                    <h3>Referred Users</h3>
                    <p>0</p>
                </div>
                <div class="card">
                    <h3>Commission Earning</h3>
                    <p>15%</p>
                </div>
            </div>
            <h2>Monthly Commission Insights</h2>
            <div class="chart">[Line Chart Placeholder]</div>
        </div>

        <!-- Referrals Analytics Section -->
        <div class="section">
            <h2>Referrals Analytics</h2>
            <div class="cards">
                <div class="card">
                    <h3>Successful Referrals</h3>
                    <p>100</p>
                </div>
                <div class="card">
                    <h3>Non-Paying Referrals</h3>
                    <p>20</p>
                </div>
                <div class="card">
                    <h3>Canceled Referrals</h3>
                    <p>30</p>
                </div>
                <div class="card">
                    <h3>Total Referrals</h3>
                    <p>50%</p>
                </div>
            </div>
        </div>

        <!-- Marketing Materials Section -->
        <div class="section">
            <h2>Organic Traffic</h2>
            <div class="marketing-cards">
                <div class="marketing-card">
                    <img src="https://via.placeholder.com/40" alt="YouTube">
                    <h4>YouTube</h4>
                    <p>Create a video tutorial or upload your video to YouTube.</p>
                </div>
                <div class="marketing-card">
                    <img src="https://via.placeholder.com/40" alt="Facebook Group">
                    <h4>Facebook Group</h4>
                    <p>Create a Facebook group and share information with followers.</p>
                </div>
                <div class="marketing-card">
                    <img src="https://via.placeholder.com/40" alt="Forums">
                    <h4>Forums</h4>
                    <p>Post or comment on forums like Quora and Blackhatworld.</p>
                </div>
                <div class="marketing-card">
                    <img src="https://via.placeholder.com/40" alt="Instagram">
                    <h4>Instagram</h4>
                    <p>Share dropshipping info on Instagram.</p>
                </div>
            </div>
            <h2>Paid Traffic</h2>
            <div class="marketing-cards">
                <div class="marketing-card">
                    <img src="https://via.placeholder.com/40" alt="Facebook Ads">
                    <h4>Facebook Ads</h4>
                    <p>Promote DropshippingScout with Facebook video ads.</p>
                </div>
                <div class="marketing-card">
                    <img src="https://via.placeholder.com/40" alt="Google AdWords">
                    <h4>Google AdWords</h4>
                    <p>Use targeted keywords to reach potential buyers.</p>
                </div>
                <div class="marketing-card">
                    <img src="https://via.placeholder.com/40" alt="YouTube Ads">
                    <h4>YouTube Ads</h4>
                    <p>Utilize YouTube ads to maximize profitability.</p>
                </div>
                <div class="marketing-card">
                    <img src="https://via.placeholder.com/40" alt="Reddit & Quora">
                    <h4>Reddit & Quora</h4>
                    <p>Engage in paid promotions on Reddit and Quora.</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
