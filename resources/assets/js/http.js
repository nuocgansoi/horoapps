/**
 * Created by mon.ls on 11/7/2016.
 */
const Request = {
  _options: {
    method: 'get',
    data: {},
    headers: {},
    dataType: 'json',
  },
  _isUpload: false,
  _beforeSend: () => {},
  uploadFile() {
    this._isUpload = true;
    return this;
  },
  before(callback) {
    this._beforeSend = callback;
    return this;
  },
  headers(obj) {
    Object.assign(this._options.headers, obj);
    return this;
  },

  header(key, val) {
    this.options.headers[key] = val;
    return this;
  },

  options(obj) {
    Object.assign(this._options, obj);
    return this;
  },

  option(key, val) {
    this._options[key] = val;
    return this;
  },

  data(key, val) {
    if (typeof key === 'string' && val) {
      this._options.data[key] = val;
    }
    if (typeof key === 'object') {
      Object.assign(this._options.data, key);
    }
    if (key instanceof FormData) {
      this._options.data = key;
    }
    return this;
  },
  get(url) {
    return this._call(url);
  },

  post(url) {
    this.option('method', 'post');
    return this._call(url);
  },

  put(url) {
    this.option('method', 'put');
    return this._call(url);
  },

  patch(url) {
    this.option('method', 'patch');
    return this._call(url);
  },

  delete(url) {
    this.option('method', 'delete');
    return this._call(url);
  },

  _call(url) {
    this.option('beforeSend', this._beforeSend());
    if (this._isUpload) {
      this.option('processData', false);
      this.option('contentType', false);
    }
    return $.ajax(url, this._options);
  },
};

export default Request;
