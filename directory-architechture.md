pentest-web-lab/
│
├── docker-compose.yml          # Chạy Web + MySQL
├── .env                        # Biến môi trường
├── .gitignore
├── README.md
│
├── web/
│   ├── Dockerfile              # PHP + Apache
│   │
│   ├── public/                 # Apache CHỈ public thư mục này
│   │   │
│   │   ├── index.php           # Trang chủ
│   │   ├── login.php           # Đăng nhập
│   │   ├── register.php        # Đăng ký
│   │   ├── logout.php          # Đăng xuất
│   │   │
│   │   ├── products.php        # Danh sách sản phẩm
│   │   ├── product.php         # Chi tiết sản phẩm
│   │   ├── search.php          # Tìm kiếm
│   │   │
│   │   ├── profile.php         # Thông tin user
│   │   ├── change-password.php # Đổi mật khẩu
│   │   ├── upload-avatar.php   # Upload avatar
│   │   ├── comments.php        # Comment
│   │   │
│   │   ├── admin/
│   │   │   ├── index.php       # Admin dashboard
│   │   │   ├── users.php       # Quản lý user
│   │   │   └── products.php    # Quản lý product
│   │   │
│   │   ├── api/
│   │   │   ├── products.php    # API product
│   │   │   ├── users.php       # API user
│   │   │   └── comments.php    # API comment
│   │   │
│   │   └── assets/             # Frontend static files
│   │       ├── css/
│   │       │   └── style.css
│   │       │
│   │       ├── js/
│   │       │   └── app.js
│   │       │
│   │       └── images/
│   │           └── logo.png
│   │
│   └── src/                    # Backend code, KHÔNG public
│       │
│       ├── config/
│       │   └── database.php    # Kết nối DB
│       │
│       ├── auth/
│       │   └── auth.php        # Login/session/authorization
│       │
│       └── helpers/
│           └── functions.php   # Hàm dùng chung
│
├── database/
│   ├── init.sql                # CREATE TABLE...
│   └── seed.sql                # Dữ liệu mẫu
│
├── uploads/                    # File user upload
│
├── tests/                      # Test sau này
│
└── notes/                      # Ghi chép quá trình pentest
    ├── sqli.md
    ├── xss.md
    ├── csrf.md
    ├── idor.md
    └── file-upload.md