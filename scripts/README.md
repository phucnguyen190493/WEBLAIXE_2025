# Hướng dẫn cài đặt và sử dụng nhận diện biển báo

## Yêu cầu

- Python 3.8 trở lên
- pip (Python package manager)

## Cài đặt dependencies

```bash
pip install ultralytics opencv-python
```

Hoặc nếu dùng conda:

```bash
conda install -c conda-forge opencv
pip install ultralytics
```

## Cấu trúc thư mục

```
datn_laixe/
├── mohinh/
│   ├── yolo11n.pt  # Model nhỏ, nhanh hơn
│   └── yolo11m.pt  # Model lớn, chính xác hơn
└── scripts/
    └── detect_traffic_sign.py
```

## Sử dụng trực tiếp (test)

```bash
python scripts/detect_traffic_sign.py --image path/to/image.jpg --model mohinh/yolo11n.pt
```

## Tích hợp với Laravel

Script sẽ được gọi tự động từ Laravel controller khi người dùng upload ảnh qua chatbox.

## Lưu ý

- Model `yolo11n.pt` nhỏ hơn và nhanh hơn, phù hợp cho production
- Model `yolo11m.pt` lớn hơn và chính xác hơn, nhưng chậm hơn
- Nếu chưa cài đặt Python dependencies, hệ thống sẽ trả về kết quả mẫu

