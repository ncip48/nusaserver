define({ "api": [
  {
    "type": "get",
    "url": "/kabupaten",
    "title": "1. Mendapatkan Seluruh Data Kabupaten",
    "version": "0.1.0",
    "name": "getKabupaten",
    "group": "Kabupaten",
    "permission": [
      {
        "name": "public"
      }
    ],
    "description": "<p>digunakan untuk mendapatkan seluruh data kabupaten yang ada di server.</p>",
    "examples": [
      {
        "title": "Cara penggunaan:",
        "content": "http://ncip.nusaserver.com/kabupaten",
        "type": "json"
      }
    ],
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "number",
            "optional": false,
            "field": "result",
            "description": "<p>Nomor Hasil.</p>"
          },
          {
            "group": "Success 200",
            "type": "Object[]",
            "optional": false,
            "field": "data",
            "description": "<p>Daftar data Kabupaten (Array of Objects).</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "data.provinsi_id",
            "description": "<p>ID Provinsi.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "data.kota_id",
            "description": "<p>ID Kota/Kabupaten.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.nama_provinsi",
            "description": "<p>Nama Provinsi.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.nama_kabupaten",
            "description": "<p>Nama Kabupaten/Kota.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Respon Sukses:",
          "content": "HTTP/1.1 200 OK\n{\n  result: \"1\",\n  data: [\n        {\n            provinsi_id: \"11\",\n            kota_id: \"1101\",\n            nama_provinsi: \"ACEH\",\n            nama_kabupaten: \"KABUPATEN SIMEULUE\"\n        },\n        {\n            provinsi_id: \"11\",\n            kota_id: \"1102\",\n            nama_provinsi: \"ACEH\",\n            nama_kabupaten: \"KABUPATEN ACEH SINGKIL\"\n        },\n        ...\n        ]\n}",
          "type": "json"
        }
      ]
    },
    "filename": "./example.js",
    "groupTitle": "Kabupaten"
  },
  {
    "type": "get",
    "url": "/kabupaten/:provinsi_id/:kota_id",
    "title": "3. Mendapatkan Detail Data Kabupaten",
    "version": "0.1.0",
    "name": "getKabupatenDetail",
    "group": "Kabupaten",
    "permission": [
      {
        "name": "public"
      }
    ],
    "description": "<p>digunakan untuk mendapatkan satu data detail kabupaten yang ada di server.</p>",
    "examples": [
      {
        "title": "Cara penggunaan:",
        "content": "http://ncip.nusaserver.com/kabupaten/11/1101",
        "type": "json"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "number",
            "optional": false,
            "field": "provinsi_id",
            "description": "<p>id provinsi sesuai dengan record provinsi_id</p>"
          },
          {
            "group": "Parameter",
            "type": "number",
            "optional": false,
            "field": "kota_id",
            "description": "<p>id kota/kabupaten sesuai dengan record kota_id</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "number",
            "optional": false,
            "field": "result",
            "description": "<p>Nomor Hasil.</p>"
          },
          {
            "group": "Success 200",
            "type": "Object[]",
            "optional": false,
            "field": "data",
            "description": "<p>Daftar data Kabupaten (Array of Objects).</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "data.provinsi_id",
            "description": "<p>ID Provinsi.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "data.kota_id",
            "description": "<p>ID Kota/Kabupaten.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.nama_provinsi",
            "description": "<p>Nama Provinsi.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.nama_kabupaten",
            "description": "<p>Nama Kabupaten/Kota.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Respon Sukses:",
          "content": "HTTP/1.1 200 OK\n{\n  result: \"1\",\n  data: [\n        {\n            provinsi_id: \"11\",\n            kota_id: \"1101\",\n            nama_provinsi: \"ACEH\",\n            nama_kabupaten: \"KABUPATEN SIMEULUE\"\n        }\n        ]\n}",
          "type": "json"
        }
      ]
    },
    "filename": "./example.js",
    "groupTitle": "Kabupaten"
  },
  {
    "type": "get",
    "url": "/kabupaten/:provinsi_id",
    "title": "2. Mendapatkan Data Kabupaten Per Provinsi",
    "version": "0.1.0",
    "name": "getKabupatenProvinsi",
    "group": "Kabupaten",
    "permission": [
      {
        "name": "public"
      }
    ],
    "description": "<p>digunakan untuk mendapatkan data kabupaten per provinsi yang ada di server.</p>",
    "examples": [
      {
        "title": "Cara penggunaan:",
        "content": "http://ncip.nusaserver.com/kabupaten/11",
        "type": "json"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "number",
            "optional": false,
            "field": "provinsi_id",
            "description": "<p>id provinsi sesuai dengan record provinsi_id</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "number",
            "optional": false,
            "field": "result",
            "description": "<p>Nomor Hasil.</p>"
          },
          {
            "group": "Success 200",
            "type": "Object[]",
            "optional": false,
            "field": "data",
            "description": "<p>Daftar data Kabupaten (Array of Objects).</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "data.provinsi_id",
            "description": "<p>ID Provinsi.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "data.kota_id",
            "description": "<p>ID Kota/Kabupaten.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.nama_provinsi",
            "description": "<p>Nama Provinsi.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.nama_kabupaten",
            "description": "<p>Nama Kabupaten/Kota.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Respon Sukses:",
          "content": "HTTP/1.1 200 OK\n{\n  result: \"1\",\n  data: [\n        {\n            provinsi_id: \"11\",\n            kota_id: \"1101\",\n            nama_provinsi: \"ACEH\",\n            nama_kabupaten: \"KABUPATEN SIMEULUE\"\n        },\n        {\n            provinsi_id: \"11\",\n            kota_id: \"1102\",\n            nama_provinsi: \"ACEH\",\n            nama_kabupaten: \"KABUPATEN ACEH SINGKIL\"\n        },\n        ...\n        ]\n}",
          "type": "json"
        }
      ]
    },
    "filename": "./example.js",
    "groupTitle": "Kabupaten"
  },
  {
    "type": "get",
    "url": "/provinsi",
    "title": "1. Mendapatkan Seluruh Data Provinsi",
    "version": "0.1.0",
    "name": "getProvinsi",
    "group": "Provinsi",
    "permission": [
      {
        "name": "public"
      }
    ],
    "description": "<p>digunakan untuk mendapatkan seluruh data provinsi yang ada di server.</p>",
    "examples": [
      {
        "title": "Cara penggunaan:",
        "content": "http://ncip.nusaserver.com/provinsi",
        "type": "json"
      }
    ],
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "provinsi_id",
            "description": "<p>ID Provinsi</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "nama_provinsi",
            "description": "<p>Nama Provinsi</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Respon Sukses:",
          "content": "HTTP/1.1 200 OK\n{\n  provinsi_id: \"11\",\n  nama_provinsi: \"ACEH\"\n},\n{\n  provinsi_id: \"12\",\n  nama_provinsi: \"SUMATERA UTARA\"\n}\n...",
          "type": "json"
        }
      ]
    },
    "filename": "./example.js",
    "groupTitle": "Provinsi"
  },
  {
    "type": "get",
    "url": "/provinsi/:provinsi_id",
    "title": "2. Mendapatkan Detail Data Provinsi",
    "version": "0.1.0",
    "name": "getProvinsiDetail",
    "group": "Provinsi",
    "permission": [
      {
        "name": "public"
      }
    ],
    "description": "<p>digunakan untuk mendapatkan detail provinsi pada server.</p>",
    "examples": [
      {
        "title": "Cara penggunaan:",
        "content": "http://ncip.nusaserver.com/provinsi/11",
        "type": "json"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "number",
            "optional": false,
            "field": "provinsi_id",
            "description": "<p>id provinsi sesuai dengan record provinsi_id</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "provinsi_id",
            "description": "<p>ID Provinsi</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "nama_provinsi",
            "description": "<p>Nama Provinsi</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Respon Sukses:",
          "content": "HTTP/1.1 200 OK\n{\n  provinsi_id: \"11\",\n  nama_provinsi: \"ACEH\"\n}",
          "type": "json"
        }
      ]
    },
    "filename": "./example.js",
    "groupTitle": "Provinsi"
  }
] });
