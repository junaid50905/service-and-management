import React from "react";
import CustomerSideNav from "../../components/SideNavs/Customer/customerSideNav";
import TopNav from "../../components/TopNavs/Customer/topnav";
import { Link } from "react-router-dom";

const PurchasedProducts = () => {
  const products = [
    {
      id: 1,
      productName: "Smartphone",
      model: "XYZ-123",
      regNo: "15242",
      purchaseDate: "2022-05-20",
      warrantyDuration: "2 years",
      warrantyTimeLeft: "365 days",
      imageUrl: "./src/assets/images/Canon_PIXMA_G650_front_side-scaled.webp",
      serviceRequestUrl: "https://example.com/service-request/1",
    },
    {
      id: 2,
      productName: "Laptop",
      model: "ABC-456",
      regNo: "11342",
      purchaseDate: "2023-01-15",
      warrantyDuration: "3 years",
      warrantyTimeLeft: "900 days",
      imageUrl: "https://example.com/product2.jpg",
      serviceRequestUrl: "https://example.com/service-request/2",
    },
    {
      id: 3,
      productName: "Refrigerator",
      model: "DEF-789",
      regNo: "15242",
      purchaseDate: "2022-10-10",
      warrantyDuration: "5 years",
      warrantyTimeLeft: "500 days",
      imageUrl: "https://example.com/product3.jpg",
      serviceRequestUrl: "https://example.com/service-request/3",
    },
    {
      id: 4,
      productName: "Smart TV",
      model: "GHI-101",
      regNo: "15242",
      purchaseDate: "2023-03-30",
      warrantyDuration: "2 years",
      warrantyTimeLeft: "600 days",
      imageUrl: "https://example.com/product4.jpg",
      serviceRequestUrl: "https://example.com/service-request/4",
    },
    {
      id: 5,
      productName: "Tablet",
      model: "JKL-202",
      regNo: "15242",
      purchaseDate: "2023-07-08",
      warrantyDuration: "1 year",
      warrantyTimeLeft: "300 days",
      imageUrl: "https://example.com/product5.jpg",
      serviceRequestUrl: "https://example.com/service-request/5",
    },
    {
      id: 6,
      productName: "Digital Camera",
      model: "MNO-303",
      regNo: "15242",
      purchaseDate: "2022-11-25",
      warrantyDuration: "4 years",
      warrantyTimeLeft: "1000 days",
      imageUrl: "https://example.com/product6.jpg",
      serviceRequestUrl: "https://example.com/service-request/6",
    },
    {
      id: 7,
      productName: "Washing Machine",
      model: "PQR-404",
      regNo: "15242",
      purchaseDate: "2023-02-12",
      warrantyDuration: "3 years",
      warrantyTimeLeft: "800 days",
      imageUrl: "https://example.com/product7.jpg",
      serviceRequestUrl: "https://example.com/service-request/7",
    },
    {
      id: 8,
      productName: "Microwave Oven",
      model: "STU-505",
      regNo: "15242",
      purchaseDate: "2023-04-05",
      warrantyDuration: "2 years",
      warrantyTimeLeft: "600 days",
      imageUrl: "https://example.com/product8.jpg",
      serviceRequestUrl: "https://example.com/service-request/8",
    },
    {
      id: 9,
      productName: "Headphones",
      model: "VWX-606",
      regNo: "15242",
      purchaseDate: "2022-08-15",
      warrantyDuration: "1 year",
      warrantyTimeLeft: "45 days",
      imageUrl: "https://example.com/product9.jpg",
      serviceRequestUrl: "https://example.com/service-request/9",
    },
    {
      id: 10,
      productName: "Gaming Console",
      model: "YZA-707",
      regNo: "15242",
      purchaseDate: "2023-06-30",
      warrantyDuration: "2 years",
      warrantyTimeLeft: "650 days",
      imageUrl: "https://example.com/product10.jpg",
      serviceRequestUrl: "https://example.com/service-request/10",
    },
  ];

  return (
    <div>
      <TopNav />
      <CustomerSideNav />
      <div className="mx-auto container-box ">
        <div className="my-6 bg-white rounded shadow-md ">
          <table className="w-full border border-collapse table-fixed border-slate-500">
            <thead>
              <tr className="text-sm leading-normal text-white uppercase bg-tableHeading">
                <th
                  className="px-1 py-3 text-center border border-slate-600"
                  style={{ width: "5%" }}
                >
                  SL
                </th>
                <th className="px-2 py-3 text-center break-words border border-slate-600">
                  Name
                </th>
                <th className="px-2 py-3 text-center break-words border border-slate-600">
                  Model
                </th>
                <th className="px-2 py-3 text-center break-words border border-slate-600">
                  Reg No
                </th>
                <th className="px-2 py-3 text-center break-words border border-slate-600">
                  Date
                </th>
                <th className="px-2 py-3 text-center break-words border border-slate-600">
                  Warranty
                </th>
                <th className="px-2 py-3 text-center break-words border border-slate-600">
                  Time Left
                </th>
                <th className="px-2 py-3 text-center break-words border border-slate-600">
                  Picture
                </th>
                <th
                  className="px-2 py-3 text-center break-words border border-slate-600"
                  style={{ width: "150px" }}
                >
                  Request Service
                </th>
              </tr>
            </thead>
            <tbody className="text-sm font-light text-gray-600">
              {products.map((product, index) => (
                <tr
                  key={product.id}
                  className="border-b border-gray-200 hover:bg-gray-100"
                >
                  <td
                    className="px-1 py-3 text-center break-words border border-slate-700"
                    style={{ width: "5%" }}
                  >
                    {index + 1}
                  </td>
                  <td className="px-2 py-3 text-center break-words border border-slate-700">
                    {product.productName}
                  </td>
                  <td className="px-2 py-3 text-center break-words border border-slate-700">
                    {product.model}
                  </td>
                  <td className="px-2 py-3 text-center break-words border border-slate-700">
                    {product.regNo}
                  </td>
                  <td className="px-2 py-3 text-center break-words border border-slate-700">
                    {product.purchaseDate}
                  </td>
                  <td className="px-2 py-3 text-center break-words border border-slate-700">
                    {product.warrantyDuration}
                  </td>
                  <td className="px-2 py-3 text-center break-words border border-slate-700">
                    {product.warrantyTimeLeft}
                  </td>
                  <td className="p-1 text-center border border-slate-700">
                    <div className="flex justify-center">
                      <img
                        src="https://www.trustedreviews.com/wp-content/uploads/sites/54/2022/07/Canon_PIXMA_G650_front_side-scaled.jpg"
                        alt={`Product ${index + 1}`}
                        className="w-full h-20"
                      />
                    </div>
                  </td>
                  <td className="text-center break-words border border-slate-700">
                    <Link
                      to={`/customer/reqservice/${product.regNo}`}
                      className="p-2 text-white bg-orange-500 rounded hover:bg-orange-600"
                    >
                      Request Service
                    </Link>
                  </td>
                </tr>
              ))}
            </tbody>
          </table>
        </div>
      </div>
    </div>
  );
};

export default PurchasedProducts;
