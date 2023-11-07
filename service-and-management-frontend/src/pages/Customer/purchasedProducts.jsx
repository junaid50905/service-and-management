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
      serialNumber: "SN45678",
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
      serialNumber: "SN35628",
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
      serialNumber: "SN172633",
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
      serialNumber: "SN111241",
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
      serialNumber: "SN312202",
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
      serialNumber: "SN115042",
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
      serialNumber: "SN317242",
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
      serialNumber: "SN815249",
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
      serialNumber: "SN819242",
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
      serialNumber: "SN915142",
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
      <div className="mx-auto container-box font-roboto">
        <table className="w-full mt-4 mb-5 rounded-lg shadow-md table-fixed">
          
          <thead>
            <tr className="text-sm leading-normal text-white uppercase bg-[#36304A]">
              <th className="px-1 py-3 font-normal text-center" style={{ width: "5%" }}>
                SL
              </th>
              <th className="px-2 py-3 font-normal text-center break-words">Name</th>
              <th className="px-2 py-3 font-normal text-center break-words ">Model</th>
              <th className="px-2 py-3 font-normal text-center break-words">
                Serial Number
              </th>
              <th className="px-2 py-3 font-normal text-center break-words">
                Purchase Date
              </th>
              <th className="px-2 py-3 font-normal text-center break-words">Warranty</th>
              <th className="px-2 py-3 font-normal text-center break-words">
                Warranty Time Left
              </th>
              <th className="px-2 py-3 font-normal text-center break-words">Picture</th>
              <th
                className="px-2 py-3 font-normal text-center break-words"
                style={{ width: "150px" }}
              >
                Request Service
              </th>
            </tr>
          </thead>
          <tbody className="text-sm font-light text-gray-900">
            {products.map((product, index) => (
              <tr
                key={product.id}
                className="transition duration-300 ease-in-out"
              >
                <td
                  className="px-1 py-3 text-center break-words "
                  style={{ width: "5%" }}
                >
                  {index + 1}
                </td>
                <td className="px-2 py-3 text-center break-words ">
                  {product.productName}
                </td>
                <td className="px-2 py-3 text-center break-words ">
                  {product.model}
                </td>
                <td className="px-2 py-3 text-center break-words ">
                  {product.serialNumber}
                </td>
                <td className="px-2 py-3 text-center break-words ">
                  {product.purchaseDate}
                </td>
                <td className="px-2 py-3 text-center break-words ">
                  {product.warrantyDuration}
                </td>
                <td className="px-2 py-3 text-center break-words ">
                  {product.warrantyTimeLeft}
                </td>
                <td className="p-1 text-center ">
                  <div className="flex justify-center">
                    <img
                      src="https://www.trustedreviews.com/wp-content/uploads/sites/54/2022/07/Canon_PIXMA_G650_front_side-scaled.jpg"
                      alt={`Product ${index + 1}`}
                      className="w-full h-20"
                    />
                  </div>
                </td>
                <td className="text-center break-words ">
                  <Link
                    to={`/customer/reqservice/${product.serialNumber}`}
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
  );
};

export default PurchasedProducts;
