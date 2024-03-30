/**
 * main.js
 * http://www.codrops.com
 *
 * Licensed under the MIT license.
 * http://www.opensource.org/licenses/mit-license.php
 *
 * Copyright 2017, Codrops
 * http://www.codrops.com
 */
;(function(window) {

	/**
	 * FolderFx obj.
	 */
	function FolderFx(el) {
		this.DOM = {};
		this.DOM.el = el;
		this.DOM.wrapper = this.DOM.el.querySelector('.folder__icon');
		this.DOM.back = this.DOM.wrapper.querySelector('.folder__icon-img--back');
		this.DOM.cover = this.DOM.wrapper.querySelector('.folder__icon-img--cover');
		this.DOM.feedback = this.DOM.el.querySelector('.folder__feedback');
		this.DOM.preview = this.DOM.el.querySelector('.folder__preview');
		this.DOM.previewElems = this.DOM.preview.children;
		this.totalPreview = this.DOM.previewElems.length;

		this._initEvents();
	}

	/**
	 * Remove/Stop any animation.
	 */
	FolderFx.prototype._removeAnimeTargets = function() {
		anime.remove(this.DOM.preview);
		anime.remove(this.DOM.previewElems);
		anime.remove(this.DOM.wrapper);
		anime.remove(this.DOM.cover);
		anime.remove(this.DOM.el);
		if( this.DOM.feedback ) {
			anime.remove(this.DOM.feedback);
			this.DOM.feedback.style.opacity = 0;
		}
		if( this.DOM.letters ) {
			anime.remove(this.DOM.letters);
		}
	};

	FolderFx.prototype._initEvents = function() {
		const self = this;
		this._mouseenterFn = function() {
			self.intimeout = setTimeout(function() {
				self._removeAnimeTargets();
				self._in();
			}, 75);
		};
		this._mouseleaveFn = function() {
			clearTimeout(self.intimeout);
			self._removeAnimeTargets();
			self._out();
		};
		this.DOM.wrapper.addEventListener('mouseenter', this._mouseenterFn);
		this.DOM.wrapper.addEventListener('mouseleave', this._mouseleaveFn);
	};

	FolderFx.prototype._in = function() {
		const self = this;
		[].slice.call(this.DOM.previewElems).forEach(function(el) {
			// Add default behaviour.
			//el.style.opacity = 1;
		});
	};

	FolderFx.prototype._out = function() {
		const self = this;
		[].slice.call(this.DOM.previewElems).forEach(function(el) {
			// Add default behaviour.
			//el.style.opacity = 0;
		});
	};

	/************************************************************************
	 * 4: ShaktiFx.
	 ************************************************************************/

	function ShaktiFx(el) {
		FolderFx.call(this, el);
	}

	ShaktiFx.prototype = Object.create(FolderFx.prototype);
	ShaktiFx.prototype.constructor = ShaktiFx;

	ShaktiFx.prototype._in = function() {
		const self = this;

		anime({
			targets: this.DOM.previewElems,
			duration: 500,
			delay: function(t, i, c) {
				return i*80;
			},
			easing: [0.1,1,0.3,1],
			rotate: function(t, i,c) {
				return [0,-10*(c-i-1) - 15 + 'deg'];
			},
			opacity: {
				value: 1,
				duration: 10,
				delay: function(t, i, c) {
					return i*80 + 10;
				},
				easing: 'linear'
			}
		});

		anime({
			targets: this.DOM.el,
			duration: 400,
			easing: [0.2,1,0.3,1],
			translateY: [0,15+'px']
		});
	};

	ShaktiFx.prototype._out = function() {
		const self = this;

		anime({
			targets: this.DOM.previewElems,
			duration: 500,
			easing: [0.1,1,0.3,1],
			rotate: 0,
			opacity: {
				value: 0,
				duration: 20,
				delay: 80,
				easing: 'linear'
			}
		});

		anime({
			targets: this.DOM.el,
			duration: 400,
			easing: [0.2,1,0.3,1],
			translateY: 0
		});
	};

	window.ShaktiFx = ShaktiFx;

})(window);