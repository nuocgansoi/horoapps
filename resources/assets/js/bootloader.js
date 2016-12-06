const Bootloader = {
  _scripts: [],
  _pendingScripts: [],
  _firstScript: document.scripts[0],
  stateChange() {
    // Execute as many scripts in order as we can
    let pendingScript;
    let firstScript = this._firstScript;
    let pendingScripts = this._pendingScripts;
    while (pendingScripts[0] && pendingScripts[0].readyState == 'loaded') {
      pendingScript = pendingScripts.shift();
      // avoid future loading events from this script (eg, if src changes)
      pendingScript.onreadystatechange = null;
      // can't just appendChild, old IE bug if element isn't closed
      firstScript.parentNode.insertBefore(pendingScript, firstScript);
    }
  },
  setScripts(list) {
    Object.assign(this._scripts, list);
    return this;
  },
  setScript(path) {
    this._scripts.push(path);
    return this;
  },
  load() {
    const firstScript = this._firstScript;
    const pendingScripts = this._pendingScripts;
    let script;
    let src;
    let stateChange = this.stateChange();
    // loop through our script urls
    while (src = this._scripts.shift()) {
      if ('async' in firstScript) { // modern browsers
        script = document.createElement('script');
        script.async = false;
        script.src = src;
        document.head.appendChild(script);
      } else if (firstScript.readyState) { // IE<10
        // create a script and add it to our todo pile
        script = document.createElement('script');
        pendingScripts.push(script);
        // listen for state changes
        script.onreadystatechange = stateChange;
        // must set src AFTER adding onreadystatechange listener
        // else we’ll miss the loaded event for cached scripts
        script.src = src;
      } else { // fall back to defer
        document.write('<script src="' + src + '" defer></' + 'script>');
      }
    }
  },

};
export default Bootloader;
