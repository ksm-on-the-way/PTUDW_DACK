<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <style>
        .modal {
            border-radius: 4px;
            box-shadow: 0 4px 2px 0 rgba(34, 34, 34, 0.03), 0 16px 40px 0 rgba(34, 34, 34, 0.3);
            background-color: var(--White, #fff);
            display: flex;
            max-width: 614px;
            flex-direction: column;
            font-size: 16px;
            padding: 24px;
        }

        @media (max-width: 991px) {
            .modal {
                padding: 0 20px;
            }
        }

        .modal-header {
            justify-content: space-between;
            display: flex;
            gap: 20px;
            font-size: 24px;
            color: var(--Shade-900, #333);
            font-weight: 500;
            line-height: 133%;
        }

        @media (max-width: 991px) {
            .modal-header {
                max-width: 100%;
                flex-wrap: wrap;
            }
        }

        .modal-title {
            font-family: Roboto, sans-serif;
        }

        .modal-icon {
            aspect-ratio: 1;
            object-fit: auto;
            object-position: center;
            width: 32px;
        }

        .modal-description {
            color: var(--Shade-600, #5a637a);
            font-family: Roboto, sans-serif;
            font-weight: 400;
            line-height: 24px;
            margin-top: 20px;
        }

        @media (max-width: 991px) {
            .modal-description {
                max-width: 100%;
            }
        }

        .modal-actions {
            justify-content: end;
            display: flex;
            margin-top: 20px;
            padding-left: 80px;
            gap: 20px;
            white-space: nowrap;
            text-align: center;
        }

        @media (max-width: 991px) {
            .modal-actions {
                flex-wrap: wrap;
                padding-left: 20px;
                white-space: initial;
            }
        }

        .modal-back-btn {
            font-family: Roboto, sans-serif;
            justify-content: center;
            border-radius: 5.067px;
            border: 1px solid rgba(90, 99, 122, 1);
            background-color: var(--White, #fff);
            color: var(--Shade-600, #5a637a);
            font-weight: 400;
            padding: 6px 16px;
        }

        @media (max-width: 991px) {
            .modal-back-btn {
                white-space: initial;
            }
        }

        .modal-cancel-btn {
            font-family: Roboto, sans-serif;
            justify-content: center;
            border-radius: 5.067px;
            background-color: var(--Royal-Blue, #1a2c50);
            color: var(--Sunshine-Yellow, #ffbe00);
            font-weight: 500;
            padding: 6px 16px;
        }

        @media (max-width: 991px) {
            .modal-cancel-btn {
                white-space: initial;
            }
        }
    </style>
    <section class="modal">
        <header class="modal-header">
            <h2 class="modal-title">Ingin Kembali?</h2>
            <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/f81257c114b9ce81c9d79bc859466d8531f3ab5865853b1354d15963ecf610cb?apiKey=a7b5919b608d4a8d87d14c0f93c1c4bc&" alt="" class="modal-icon" />
        </header>
        <p class="modal-description">
            Kursi yang kamu pilih sebelumnya akan dibatalkan dan kamu harus memilih ulang
        </p>
        <div class="modal-actions">
            <button class="modal-back-btn">Kembali</button>
            <button class="modal-cancel-btn">Batal</button>
        </div>
    </section>
</body>

</html>