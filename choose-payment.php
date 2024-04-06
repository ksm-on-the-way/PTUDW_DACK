<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <style>
        .payment-container {
            border-radius: 12px;
            box-shadow: 0px 4px 2px 0px rgba(34, 34, 34, 0.03), 0px 16px 40px 0px rgba(34, 34, 34, 0.3);
            background-color: #fff;
            display: flex;
            max-width: 415px;
            flex-direction: column;
            font-size: 18px;
            color: #5a637a;
            font-weight: 500;
            padding: 32px 24px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translateX(-50%) translateY(-50%);
            width: 500px;
            height: 500px;
            overflow: auto;
        }

        .payment-container::-webkit-scrollbar {
            width: 12px;
        }

        .payment-container::-webkit-scrollbar-track {
            background-color: #e4e4e4;
            border-radius: 100px;
        }

        .payment-container::-webkit-scrollbar-thumb {
            background-color: #d4aa70;
            border-radius: 100px;
        }

        .payment-header {
            justify-content: center;
            display: flex;
            gap: 8px;
            font-size: 24px;
            color: #333;
            line-height: 133%;
            margin-top: 20px;
        }

        .payment-title {
            font-family: Roboto, sans-serif;
            flex: 1;
        }

        .payment-icon-close {
            width: 24px;
            margin: auto 0;
        }

        .payment-icon-close:hover {
            cursor: pointer;
        }

        .payment-section-title {
            font-family: Roboto, sans-serif;
            margin-top: 20px;
        }

        .payment-method {
            display: flex;
            margin-top: 20px;
            flex-direction: column;
            font-size: 16px;
            color: #333d58;
            font-weight: 400;
            white-space: nowrap;
            line-height: 150%;
            padding: 6px 0 0 8px;
        }

        .payment-method-item {
            padding-right: 8px;
            align-items: center;
            display: flex;
            gap: 16px;
        }

        .payment-method-logo {
            width: 40px;
            align-self: stretch;
        }

        .payment-method-name {
            font-family: Roboto, sans-serif;
            align-self: stretch;
            flex: 1;
            margin: auto 0;
        }

        .payment-method-arrow {
            width: 24px;
            align-self: stretch;
            margin: auto 0;
        }

        .payment-method-separator {
            background-color: #dadfe8;
            margin-top: 6px;
            height: 1px;
        }

        .payment-method-list {
            display: flex;
            flex-direction: column;
        }

        .payment-method-list-item {
            display: flex;
            flex-direction: column;
            padding: 6px 0 0 8px;
        }

        .payment-method-list-item-content {
            display: flex;
            gap: 16px;
        }
    </style>

    <div class="payment-container">
        <div class="payment-header">
            <h2 class="payment-title">Chọn phương thức thanh toán</h2>
            <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/099ed96059166ea65c7ab58186160d633f479de257bfe14b761606955ac1d486?apiKey=a7b5919b608d4a8d87d14c0f93c1c4bc&" alt="" class="payment-icon-close" />
        </div>
        <div class="payment-content">
            <h3 class="payment-section-title">Ví ảo</h3>
            <div class="payment-method">
                <div class="payment-method-item">
                    <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/5a0b79a3c3b94cc72164345847d2dfc6969014b76b77361ad58d819ed2b0ea6b?apiKey=a7b5919b608d4a8d87d14c0f93c1c4bc&" alt="DANA logo" class="payment-method-logo" />
                    <span class="payment-method-name">DANA</span>
                    <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/9295c7b95ac44f519b7282a73527a2ed549123c77b9c23621005e78a17a25bff?apiKey=a7b5919b608d4a8d87d14c0f93c1c4bc&" alt="" class="payment-method-arrow" />
                </div>
                <div class="payment-method-separator"></div>
            </div>

            <h3 class="payment-section-title">Minimarket</h3>
            <div class="payment-method-list">
                <div class="payment-method-list-item">
                    <div class="payment-method-list-item-content">
                        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/d879f3e9cb72f845760e7de7c0d399f1e9b21eabde5c74ffa0a305ab1a50c8ff?apiKey=a7b5919b608d4a8d87d14c0f93c1c4bc&" alt="Indomaret logo" class="payment-method-logo" />
                        <span class="payment-method-name">Indomaret</span>
                    </div>
                    <div class="payment-method-separator"></div>
                </div>
                <div class="payment-method-list-item">
                    <div class="payment-method-list-item-content">
                        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/d9733dc5b5b41af936cce680a248ec34fd99ddadb86a51190159ac737dcfa60d?apiKey=a7b5919b608d4a8d87d14c0f93c1c4bc&" alt="Alfamart logo" class="payment-method-logo" />
                        <span class="payment-method-name">Alfamart</span>
                    </div>
                    <div class="payment-method-separator"></div>
                </div>
            </div>

            <h3 class="payment-section-title">Chuyển khoản ngân hàng</h3>
            <div class="payment-method-list">
                <div class="payment-method-list-item">
                    <div class="payment-method-list-item-content">
                        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/67832c34ce203a1a0026553b1be990cc9964695cbfafd790784a1ef9d56580fc?apiKey=a7b5919b608d4a8d87d14c0f93c1c4bc&" alt="Bank BCA logo" class="payment-method-logo" />
                        <span class="payment-method-name">Bank BCA</span>
                    </div>
                    <div class="payment-method-separator"></div>
                </div>
                <div class="payment-method-list-item">
                    <div class="payment-method-list-item-content">
                        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/06f10a556a4169c8a9103444c5b9b4e70c47b8393bda58598cd532bf0c1a9fe0?apiKey=a7b5919b608d4a8d87d14c0f93c1c4bc&" alt="Bank BRI logo" class="payment-method-logo" />
                        <span class="payment-method-name">Bank BRI</span>
                    </div>
                    <div class="payment-method-separator"></div>
                </div>
                <div class="payment-method-list-item">
                    <div class="payment-method-list-item-content">
                        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/c17e6bb767bc53bc2d9956a3545036c771eeedee773d14e55e1d8e2f4980ec93?apiKey=a7b5919b608d4a8d87d14c0f93c1c4bc&" alt="Bank BNI logo" class="payment-method-logo" />
                        <span class="payment-method-name">Bank BNI</span>
                    </div>
                    <div class="payment-method-separator"></div>
                </div>
                <div class="payment-method-list-item">
                    <div class="payment-method-list-item-content">
                        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/3cf9374a84b8f4ec9220a0a4d4ac62437caca66a450df6af0fbe68e0facf55b4?apiKey=a7b5919b608d4a8d87d14c0f93c1c4bc&" alt="Bank Mandiri logo" class="payment-method-logo" />
                        <span class="payment-method-name">Bank Mandiri</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>